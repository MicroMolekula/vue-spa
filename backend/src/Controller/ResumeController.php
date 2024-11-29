<?php

namespace App\Controller;

use App\Document\Resume;
use App\DTO\StatusUpdateDTO;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ResumeController extends AbstractController
{
    public function __construct(
        private DocumentManager $manager,
        private SerializerInterface $serializer,
    ) {
    }

    #[Route('/api/cv', name: 'app_cv', methods: ['GET'])]
    public function getAllResume(): JsonResponse
    {
        $resumes = $this->manager->getRepository(Resume::class)->findAll();
        return $this->json($resumes);
    }

    #[Route('/api/cv/add', name: 'app_cv_add', methods: ['POST'])]
    public function createResume(Request $request): JsonResponse
    {
        $resume = $this->serializer->deserialize($request->getContent(), Resume::class, 'json');
        $this->manager->persist($resume);
        $this->manager->flush();
        return $this->json([
            'success' => true,
            'message' => 'Resume created successfully',
        ], 201);
    }

    #[Route('/api/cv/{id}', name: 'app_cv_show', methods: ['GET'])]
    public function getResume(string $id): JsonResponse
    {
        try {
            $resume = $this->manager->getRepository(Resume::class)->find($id);
            if (!$resume) {
                return $this->json([
                    'success' => false,
                    'message' => 'Resume not found',
                ], 404);
            }
            return $this->json($resume);
        } catch (\Exception $exception) {
            return $this->json([
                'success' => false,
                'message' => 'Error',
            ], 500);
        }
    }

    #[Route('/api/cv/{id}/edit', name: 'app_resume_edit', methods: ['POST'])]
    public function editResume(Request $request, string $id): JsonResponse
    {
        $resume = $this->manager->getRepository(Resume::class)->find($id);
        if (!$resume) {
            return $this->json([
                'success' => false,
                'message' => 'Resume not found',
            ], 404);
        }
        $resume = $this->serializer->deserialize($request->getContent(), Resume::class, 'json');
        $resume->setId($id);
        $this->manager->persist($resume);
        $this->manager->flush();
        return $this->json([
            'success' => true,
            'message' => 'Resume updated successfully',
        ]);
    }

    #[Route('/api/cv/{id}/status/update', name: 'app_resume_status_update', methods: ['POST'])]
    public function updateStatus(Request $request, string $id): JsonResponse
    {
        $statusDto = $this->serializer->deserialize($request->getContent(), StatusUpdateDTO::class, 'json');
        $resume = $this->manager->getRepository(Resume::class)->find($id);
        if (!$resume) {
            return $this->json([
                'success' => false,
                'message' => 'Resume not found',
            ], 404);
        }
        $resume->setStatus($statusDto->status);
        $this->manager->persist($resume);
        $this->manager->flush();
        return $this->json([
            'success' => true,
            'message' => 'Resume updated successfully',
        ]);
    }
}