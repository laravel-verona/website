<?php

use App\Entity\Meetup;
use App\Entity\Annotation;
use App\Repository\AnnotationRepository;
use App\Exceptions\MeetupNotFoundException;
use App\Exceptions\AnnotationNotFoundException;

class AnnotationTest extends TestCase
{
    protected $filesystem;
    protected $annotationRepo;
    protected $meetupList = ['2015-12-15', '2015-12-01'];

    public function setUp()
    {
        parent::setUp();

        $this->annotationRepo = app(AnnotationRepository::class);
        $this->filesystem = $this->annotationRepo->getFilesystem();

        $this->annotationRepo->setPath(__DIR__.'/temp');

        $this->createTempAnnotations();
    }

    /**
     * Crea i Meetup e le Annotations di esempio necessarie per eseguire i test.
     *
     * @return void
     */
    protected function createTempAnnotations()
    {
        $this->filesystem->createDir('.git');

        foreach ($this->meetupList as $date) {
            $this->filesystem->createDir($date);

            $this->filesystem->put("{$date}/annotation_1.md", "# Annotation 1 - {$date}");
            $this->filesystem->put("{$date}/annotation_2.md", "# Annotation 2 - {$date}");
        }
    }

    /**
     * Al completamento del test elimino i files di esempio.
     *
     * @return void
     */
    public function tearDown()
    {
        $this->filesystem->getAdapter()->setPathPrefix(__DIR__);
        $this->filesystem->deleteDir('temp');
    }

    public function testGetFilesystemPath()
    {
        $this->assertEquals(__DIR__.'/temp', $this->annotationRepo->getPath());
    }

    public function testGetMeetupList()
    {
        $meetups = $this->annotationRepo->getMeetup();

        $this->assertCount(count($this->meetupList), $meetups);
        $this->assertEquals($meetups[0]->path, $this->meetupList[0]);
        $this->assertEquals($meetups[0]->path, $meetups[0]->date->format('Y-m-d'));
    }

    public function testFindMeetup()
    {
        $meetup = $this->annotationRepo->findMeetup($this->meetupList[0]);
        $this->assertInstanceOf(Meetup::class, $meetup);

        $this->setExpectedException(MeetupNotFoundException::class);
        $this->annotationRepo->findMeetup('0');
    }

    public function testMeetupAttributes()
    {
        $meetup = $this->annotationRepo->findMeetup($this->meetupList[0]);

        $this->assertEquals($this->meetupList[0], $meetup->path);
        $this->assertEquals($this->meetupList[0], $meetup->date->format('Y-m-d'));
    }

    public function testGetAnnotations()
    {
        $annotations = $this->annotationRepo->get($this->meetupList[0]);

        $this->assertCount(2, $annotations);
        $this->assertEquals($annotations[0]->name, 'annotation_1');
    }

    public function testFindAnnotation()
    {
        $annotation = $this->annotationRepo->find($this->meetupList[0].'/annotation_1');
        $this->assertInstanceOf(Annotation::class, $annotation);

        $annotation = $this->annotationRepo->find($this->meetupList[0].'/annotation_1.md');
        $this->assertInstanceOf(Annotation::class, $annotation);

        $this->setExpectedException(AnnotationNotFoundException::class);
        $this->annotationRepo->find('0');
    }

    public function testAnnotationAttributes()
    {
        $annotation = $this->annotationRepo->find($this->meetupList[0].'/annotation_1');

        $this->assertStringEndsNotWith('.md', $annotation->name);
        $this->assertEquals($this->meetupList[0], $annotation->date->format('Y-m-d'));

        // Test conversione Markdown -> HTML
        $this->assertContains('# Annotation', $annotation->content);
        $this->assertContains('<h1>Annotation', $annotation->html);
    }
}
