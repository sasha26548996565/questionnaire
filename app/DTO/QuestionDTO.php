<?php

declare(strict_types=1);

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class QuestionDTO extends DataTransferObject
{
    public string $question;
    public array $options;
    public string $right_answer;
}
