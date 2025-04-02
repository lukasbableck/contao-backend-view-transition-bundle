<?php
namespace Lukasbableck\ContaoBackendViewTransitionBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\JsonManifestVersionStrategy;

#[AsHook('outputBackendTemplate')]
class OutputBackendTemplateListener {
	public function __invoke(string $buffer, string $template): string {
		if ($template === 'be_main') {
			$buffer = str_replace(
				'</head>',
				'<meta name="view-transition"></head>',
				$buffer
			);

			$package = new Package(new JsonManifestVersionStrategy(__DIR__.'/../../public/manifest.json'));
			$GLOBALS['TL_CSS'][] = $package->getUrl('backend.css');
			$GLOBALS['TL_JAVASCRIPT'][] = $package->getUrl('backend.js');
		}

		return $buffer;
	}
}
