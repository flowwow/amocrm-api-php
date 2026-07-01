<?php

declare(strict_types=1);

namespace AmoCRM\Collections\Talks;

use AmoCRM\Collections\BaseApiCollection;
use AmoCRM\Collections\Interfaces\HasPagesInterface;
use AmoCRM\Collections\Traits\PagesTrait;
use AmoCRM\Models\TalkModel;

/**
 * @method TalkModel|null current()
 * @method TalkModel|null last()
 * @method TalkModel|null first()
 * @method TalkModel|null offsetGet($offset)
 * @method void offsetSet($offset, TalkModel $value)
 * @method TalksCollection prepend(TalkModel $value)
 * @method TalksCollection add(TalkModel $value)
 * @method TalkModel|null getBy($key, $value)
 */
class TalksCollection extends BaseApiCollection implements HasPagesInterface
{
    use PagesTrait;

    public const ITEM_CLASS = TalkModel::class;
}
