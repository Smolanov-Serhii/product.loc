<?php

namespace App\Traits;

trait HasSoftDeletedRelation {

    public function delete()
    {
        foreach ($this->softDelete_relations as $relation) {

            if($this[$relation]) {

                if(is_countable($this[$relation])) {

                    foreach ($this[$relation] as $related_model) {

                        $related_model->delete();
                    }
                } else {
                    
                    $this[$relation]->delete();
                }
            }
        }

        parent::delete();
    }
}
