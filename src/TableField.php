<?php

namespace Ayctor\TableField;

use Laravel\Nova\Fields\Field;

class Table extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'table-field';

    /**
     * Set the default row number.
     *
     * @param  int  $rows
     *
     * @return $this
     */
    public function rows(int $rows = 4): self
    {
        return $this->withMeta(['rows' => $rows]);
    }

    /**
     * Set the default column number.
     *
     * @param  int  $columns
     *
     * @return $this
     */
    public function columns(int $columns = 4): self
    {
        return $this->withMeta(['columns' => $columns]);
    }

    /**
     * Set the headers
     *
     * @param  array  $headers
     *
     * @return $this
     */
    public function headers(array $headers = []): self
    {
        return $this->withMeta(['headers' => $headers]);
    }

    /**
     * Set the label for the add row button
     *
     * @param  string  $label
     *
     * @return $this
     */
    public function addRowButtonLabel(string $label = 'Add row'): self
    {
        return $this->withMeta(['addRowButtonLabel' => $label]);
    }

    /**
     * Set the label for the add column button
     *
     * @param  string  $label
     *
     * @return $this
     */
    public function addColumnButtonLabel(string $label = 'Add column'): self
    {
        return $this->withMeta(['addColumnButtonLabel' => $label]);
    }

    /**
     * Set the label for the remove row button
     *
     * @param  string  $label
     *
     * @return $this
     */
    public function removeRowButtonLabel(string $label = 'Remove row'): self
    {
        return $this->withMeta(['removeRowButtonLabel' => $label]);
    }

    /**
     * Set the label for the remove column button
     *
     * @param  string  $label
     *
     * @return $this
     */
    public function removeColumnButtonLabel(string $label = 'Remove column'): self
    {
        return $this->withMeta(['removeColumnButtonLabel' => $label]);
    }
}
