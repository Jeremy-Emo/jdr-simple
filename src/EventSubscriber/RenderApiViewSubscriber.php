<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use App\Exception\ApiException;
use App\Renderer\JsonRenderer;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class RenderApiViewSubscriber implements EventSubscriberInterface
{
    public function __construct(private JsonRenderer $jsonRenderer)
    {
    }

    /**
     * @return array<string, array<int, array<int, int|string>>>
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::VIEW => [
                ['renderView', 100],
            ],
        ];
    }

    public function renderView(ViewEvent $event): void
    {
        if ($this->ifRouteNameStartsWithApi($event->getRequest())) {
            return;
        }

        $acceptHeaders = $this->getRequestAcceptHeaderList($event->getRequest());
        if (0 === count($acceptHeaders)) {
            throw new ApiException('Header Accept manquant', 400);
        }

        $controllerResult = $event->getControllerResult();
        if (!is_object($controllerResult)) {
            throw new ApiException('Erreur de type de retour', 500);
        }

        $content = $this->jsonRenderer->render($controllerResult);
        $response = (new Response())->setContent($content);
        $response->headers->set('content-type', $this->jsonRenderer->supports());

        $event->setResponse($response);
    }

    private function ifRouteNameStartsWithApi(Request $request): bool
    {
        return !str_starts_with($request->attributes->get('_route'), 'api_');
    }

    /**
     * @return string[]
     */
    private function getRequestAcceptHeaderList(Request $request): array
    {
        $originalHeader = $request->headers->get('accept');
        if (null === $originalHeader) {
            return [];
        }

        return explode(',', $originalHeader);
    }
}
