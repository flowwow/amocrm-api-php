<?php

declare(strict_types=1);

namespace AmoCRM\Filters;

use AmoCRM\Filters\Interfaces\HasPagesInterface;
use AmoCRM\Filters\Traits\ArrayOrNumericFilterTrait;
use AmoCRM\Filters\Traits\ArrayOrStringFilterTrait;
use AmoCRM\Filters\Traits\PagesFilterTrait;

use function is_null;

class TalksFilter extends BaseEntityFilter implements HasPagesInterface
{
    use PagesFilterTrait;
    use ArrayOrNumericFilterTrait;
    use ArrayOrStringFilterTrait;

    /** @var array<int, int>|null */
    private $talkIds = null;

    /** @var array<int, int>|null */
    private $entityIds = null;

    /** @var array<array-key, string>|null */
    private $entityTypes = null;

    /** @var array<int, int>|null */
    private $contactIds = null;

    /** @var bool|null */
    private $onlyInWork = null;

    /**
     * @return array<int, int>|null
     */
    public function getTalkIds(): ?array
    {
        return $this->talkIds;
    }

    /**
     * @param array<int, int>|int $talkIds
     *
     * @return self
     */
    public function setTalkIds($talkIds): self
    {
        $this->talkIds = $this->parseArrayOrNumberFilter($talkIds);

        return $this;
    }

    /**
     * @return array<int, int>|null
     */
    public function getEntityIds(): ?array
    {
        return $this->entityIds;
    }

    /**
     * @param array<int, int>|int $entityIds
     *
     * @return self
     */
    public function setEntityIds($entityIds): self
    {
        $this->entityIds = $this->parseArrayOrNumberFilter($entityIds);

        return $this;
    }

    /**
     * @return array<array-key, string>|null
     */
    public function getEntityTypes(): ?array
    {
        return $this->entityTypes;
    }

    /**
     * @param array<array-key, string>|string $entityTypes
     *
     * @return self
     */
    public function setEntityTypes($entityTypes): self
    {
        $this->entityTypes = $this->parseArrayOrStringFilter($entityTypes);

        return $this;
    }

    /**
     * @return array<int, int>|null
     */
    public function getContactIds(): ?array
    {
        return $this->contactIds;
    }

    /**
     * @param array<int, int>|int $contactIds
     *
     * @return self
     */
    public function setContactIds($contactIds): self
    {
        $this->contactIds = $this->parseArrayOrNumberFilter($contactIds);

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getOnlyInWork(): ?bool
    {
        return $this->onlyInWork;
    }

    /**
     * @param bool $onlyInWork
     *
     * @return self
     */
    public function setOnlyInWork(bool $onlyInWork): self
    {
        $this->onlyInWork = $onlyInWork;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function buildFilter(): array
    {
        $filter = [];

        if (!is_null($this->getTalkIds())) {
            $filter['filter']['talk_id'] = $this->getTalkIds();
        }

        if (!is_null($this->getEntityIds())) {
            $filter['filter']['entity_id'] = $this->getEntityIds();
        }

        if (!is_null($this->getEntityTypes())) {
            $filter['filter']['entity_type'] = $this->getEntityTypes();
        }

        if (!is_null($this->getContactIds())) {
            $filter['filter']['contact_id'] = $this->getContactIds();
        }

        if (!is_null($this->getOnlyInWork())) {
            $filter['filter']['only_in_work'] = $this->getOnlyInWork();
        }

        return $this->buildPagesFilter($filter);
    }
}
