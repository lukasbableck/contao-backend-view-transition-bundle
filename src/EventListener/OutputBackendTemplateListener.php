<?php
namespace Lukasbableck\ContaoBackendViewTransitionBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;

#[AsHook('outputBackendTemplate')]
class OutputBackendTemplateListener {
	public function __invoke(string $buffer, string $template): string {
		if ($template === 'be_main') {
			$buffer = str_replace(
				'</head>',
				'<meta name="view-transition"></head>',
				$buffer
			);
		}

		return $buffer;
	}
}
