<?php namespace Lecturize\Taxonomies\Traits;

use Lecturize\Taxonomies\Models\Taxonomy;
use Lecturize\Taxonomies\Models\Term;

/**
 * Class ModelFinder
 * @package Lecturize\Taxonomies\Traits
 */
trait ModelFinder
{
    /**
     * Find term by slug.
     *
     * @param  string  $slug
     * @return Term
     */
    public function findTerm(string $slug): Term
    {
        return Term::whereSlug($slug)->first();
    }

    /**
     * Find taxonomy by term id.
     *
     * @param  int     $term_id
     * @param  string  $taxonomy
     * @return Taxonomy
     */
    public function findTaxonomyByTerm(int $term_id, string $taxonomy): Taxonomy
    {
        return $this->findCategory($term_id, $taxonomy, 'id');
    }

    /**
     * Find category by term (category title) and taxonomy.
     *
     * @param  string|int  $term
     * @param  string      $taxonomy
     * @param  string      $term_field
     * @return Taxonomy
     */
    public function findCategory($term, string $taxonomy, string $term_field = 'title'): Taxonomy
    {
        return Taxonomy::taxonomy($taxonomy)
                       ->term($term, $term_field)
                       ->first();
    }
}