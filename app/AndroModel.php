<?php
/**
 * Created by PhpStorm.
 * User: Andrija
 * Date: 06-Oct-16
 * Time: 11:23 AM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class AndroModel extends Model
{
    /**
     * Handle lazy loaded relationships. Call chain:
     * Model::__get() => Model::getAttribute() => Model::getRelationshipFromMethod();
     */
    protected function getRelationshipFromMethod($method)
    {
        $relations = $this->$method();

        if (! $relations instanceof \Illuminate\Database\Eloquent\Relations\Relation) {
            throw new \LogicException('Relationship method must return an object of type '
                .'Illuminate\Database\Eloquent\Relations\Relation');
        }

        $results = $relations->getResults();

        /**
         * Relationships to many records will always be a Collection, even when empty.
         * Relationships to one record will either be a Model or null. When the
         * result is null, override with a new instance of the related model.
         */
        if (is_null($results)) {
            $results = $relations->getRelated()->newInstance();
        }

        return $this->relations[$method] = $results;
    }

    /**
     * Handle eager loaded relationships. Call chain:
     * Model::with() => Builder::with(): sets builder eager loads
     * Model::get() => Builder::get() => Builder::eagerLoadRelations() => Builder::loadRelation()
     *     =>Relation::initRelation() => Model::setRelation()
     *     =>Relation::match() =>Relation::matchOneOrMany() => Model::setRelation()
     */
    public function setRelation($relation, $value)
    {
        /**
         * Relationships to many records will always be a Collection, even when empty.
         * Relationships to one record will either be a Model or null. When attempting
         * to set to null, override with a new instance of the expected model.
         */
        if (is_null($value)) {
            /**
             * This assumes you have the relationship method on the model. Calling
             * the method gets the relationship object; it does not actually run
             * any queries.
             */
            $relationship = $this->$relation();

            // set the value to a new instance of the related model
            $value = $relationship->getRelated()->newInstance();
        }

        $this->relations[$relation] = $value;

        return $this;
    }
}