<?php

namespace App\Test\Controller;

use App\Entity\Assignment;
use App\Repository\AssignmentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AssignmentControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private AssignmentRepository $repository;
    private string $path = '/admin/assignment/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Assignment::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Assignment index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'assignment[title]' => 'Testing',
            'assignment[content]' => 'Testing',
            'assignment[startDate]' => 'Testing',
            'assignment[dueDate]' => 'Testing',
            'assignment[grade]' => 'Testing',
            'assignment[lesson]' => 'Testing',
        ]);

        self::assertResponseRedirects('/admin/assignment/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Assignment();
        $fixture->setTitle('My Title');
        $fixture->setContent('My Title');
        $fixture->setStartDate('My Title');
        $fixture->setDueDate('My Title');
        $fixture->setGrade('My Title');
        $fixture->setLesson('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Assignment');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Assignment();
        $fixture->setTitle('My Title');
        $fixture->setContent('My Title');
        $fixture->setStartDate('My Title');
        $fixture->setDueDate('My Title');
        $fixture->setGrade('My Title');
        $fixture->setLesson('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'assignment[title]' => 'Something New',
            'assignment[content]' => 'Something New',
            'assignment[startDate]' => 'Something New',
            'assignment[dueDate]' => 'Something New',
            'assignment[grade]' => 'Something New',
            'assignment[lesson]' => 'Something New',
        ]);

        self::assertResponseRedirects('/admin/assignment/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getTitle());
        self::assertSame('Something New', $fixture[0]->getContent());
        self::assertSame('Something New', $fixture[0]->getStartDate());
        self::assertSame('Something New', $fixture[0]->getDueDate());
        self::assertSame('Something New', $fixture[0]->getGrade());
        self::assertSame('Something New', $fixture[0]->getLesson());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Assignment();
        $fixture->setTitle('My Title');
        $fixture->setContent('My Title');
        $fixture->setStartDate('My Title');
        $fixture->setDueDate('My Title');
        $fixture->setGrade('My Title');
        $fixture->setLesson('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/admin/assignment/');
    }
}
