<?php

namespace App\Views;

use App\Traits\Magic;
use App\Traits\Iterator;
use App\Traits\Count;
use App\Traits\ArrayAccess;

/*
 * Class View
 * Класс представления
 *
 * @package App
 */
class View
    implements \Iterator, \Countable, \ArrayAccess
{
    use Magic;
    use Iterator;
    use Count;
    use ArrayAccess;

    /*
     * Возвращает строку - HTML-код шаблона
     *
     * @param string $template
     */
    public function render(string $template)
    {
        ob_start();
        //foreach ($this->data as $name => $value) {
        //    $$name = $value;
        //}
        include $template;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    /*
     * Возвращает строку - HTML-код шаблона
     *
     * @param string $template
     */
    public function display(string $template)
    {
        echo $this->render($template);
    }
}