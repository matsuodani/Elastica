<?php

namespace Elastica\QueryBuilder\DSL;

use Elastica\Exception\NotImplementedException;
use Elastica\QueryBuilder\DSL;
use Elastica\Suggest\Completion;
use Elastica\Suggest\Phrase;
use Elastica\Suggest\Term;

/**
 * elasticsearch suggesters DSL.
 *
 * @author Manuel Andreo Garcia <andreo.garcia@googlemail.com>
 *
 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/search-suggesters.html
 */
class Suggest implements DSL
{
    /**
     * must return type for QueryBuilder usage.
     */
    public function getType(): string
    {
        return self::TYPE_SUGGEST;
    }

    /**
     * term suggester.
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/search-suggesters-term.html
     *
     * @param $name
     * @param $field
     */
    public function term($name, $field): Term
    {
        return new Term($name, $field);
    }

    /**
     * phrase suggester.
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/search-suggesters-phrase.html
     *
     * @param $name
     * @param $field
     */
    public function phrase($name, $field): Phrase
    {
        return new Phrase($name, $field);
    }

    /**
     * completion suggester.
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/search-suggesters-completion.html
     *
     * @param string $name
     * @param string $field
     */
    public function completion($name, $field): Completion
    {
        return new Completion($name, $field);
    }

    /**
     * context suggester.
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/suggester-context.html
     */
    public function context()
    {
        throw new NotImplementedException();
    }
}
