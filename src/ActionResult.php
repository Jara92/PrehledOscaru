<?php

namespace Src;

/**
 * Result of Controller action.
 */
class ActionResult
{
    private string $view;
    private array $data;

    /**
     * @param string $view View name to be rendered
     * @param array $data Data to be passed to the view
     */
    public function __construct(string $view, array $data = [])
    {
        $this->view = $view;
        $this->data = $data;
    }

    /**
     * Render the result.
     * @return void
     */
    public function render(): void
    {
        extract($this->data);
        require "views/{$this->view}.phtml";
    }
}