<?php

namespace App\Transformers;

use App\Teacher;
use Flugg\Responder\Transformers\Transformer;

class TeacherTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'subject' => SubjectTransformer::class
    ];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param  \App\Teacher $teacher
     * @return array
     */
    public function transform(Teacher $teacher)
    {
        return [
            'id' => (int) $teacher->id,
        ];
    }
}
