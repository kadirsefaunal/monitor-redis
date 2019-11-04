<?php

namespace App\Controller;

use App\Service\RedisService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RedisController extends AbstractController
{
    /**
     * @var RedisService
     */
    private $redisService;

    public function __construct(RedisService $redisService)
    {
        $this->redisService = $redisService;
    }

    /**
     * @Route("/redis/keys", name="redis_getkeys")
     */
    public function index()
    {
        return $this->json(
            $this->redisService->getKeys(),
            Response::HTTP_OK
        );
    }

    /**
     * @Route("/redis/keys/{key}", name="redis_getkey")
     */
    public function getCache($key)
    {
        return $this->json(
            $this->redisService->getValue($key),
            Response::HTTP_OK
        );
    }
}
