<?php

namespace App\Transformers;

use App\Subject;
use App\Teacher;
use Flugg\Responder\Transformers\Transformer;
use Psy\Util\Str;

class SubjectTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'teacher' => TeacherTransformer::class
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
     * @param  \App\Subject $subject
     * @return array
     */
    public function transform(Subject $subject)
    {
        return [
            'id' => (int) $subject->id,
            'name' => $subject->name,
            'teacher' => $subject->teacher
        ];
    }
}
