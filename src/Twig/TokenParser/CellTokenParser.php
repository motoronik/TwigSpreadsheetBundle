<?php

namespace MewesK\TwigSpreadsheetBundle\Twig\TokenParser;

use MewesK\TwigSpreadsheetBundle\Twig\Node\CellNode;

/**
 * Class CellTokenParser.
 */
class CellTokenParser extends BaseTokenParser
{
    /**
     * {@inheritdoc}
     */
    public function configureParameters(\Twig\Token $token): array
    {
        return [
            'index' => [
                'type' => self::PARAMETER_TYPE_VALUE,
                'default' => new \Twig\Node\Expression\ConstantExpression(null, $token->getLine()),
            ],
            'properties' => [
                'type' => self::PARAMETER_TYPE_ARRAY,
                'default' => new \Twig\Node\Expression\ArrayExpression([], $token->getLine()),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function createNode(array $nodes = [], int $lineNo = 0): \Twig\Node\Node
    {
        return new CellNode($nodes, $this->getAttributes(), $lineNo, $this->getTag());
    }

    /**
     * {@inheritdoc}
     */
    public function getTag()
    {
        return 'xlscell';
    }
}
