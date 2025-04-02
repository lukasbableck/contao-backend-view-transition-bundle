<?php
namespace Lukasbableck\ContaoBackendViewTransitionBundle\EventListener;

use Contao\CoreBundle\Routing\ScopeMatcher;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\JsonManifestVersionStrategy;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\RequestEvent;

#[AsEventListener]
class AddBackendAssetsListener {
	public function __construct(private readonly ScopeMatcher $scopeMatcher) {
	}

	public function __invoke(RequestEvent $event): void {
		if (!$this->scopeMatcher->isBackendMainRequest($event)) {
			return;
		}

		$package = new Package(new JsonManifestVersionStrategy(__DIR__.'/../../public/manifest.json'));
		$GLOBALS['TL_CSS'][] = $package->getUrl('backend.css');
		$GLOBALS['TL_JAVASCRIPT'][] = $package->getUrl('backend.js');
	}
}
