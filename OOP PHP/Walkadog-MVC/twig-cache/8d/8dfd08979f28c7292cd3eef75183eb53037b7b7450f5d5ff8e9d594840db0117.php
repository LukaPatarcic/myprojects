<?php

/* _global/index.html.twig */
class __TwigTemplate_42e84f4bc2ef5a4ce180fff7f86b4c8e98c51be7e3d744d5a8ba7e22b83bf857 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'main' => [$this, 'block_main'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Auction House | ";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
</head>
<body>
    <header>
        <div class=\"banner\">
            <a href=\"/\" class=\"banner\">
                <img src=\"/assets/img/banner-default.jpg\" alt=\"Banner1\">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href=\"/\">Home</a>
                <li><a href=\"/categories\">Categories</a>
                <li><a href=\"/profile\">Profile</a>
                <li><a href=\"/contact\">Contact</a>
                <li><a href=\"/log-out\">Logout</a>
            </ul>
        </nav>
    </header>
    <main>
        ";
        // line 25
        $this->displayBlock('main', $context, $blocks);
        // line 28
        echo "
    </main>
    <footer>
        &copy; ";
        // line 31
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " - Auction House

    </footer>

</body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        echo "Main";
    }

    // line 25
    public function block_main($context, array $blocks = [])
    {
        // line 26
        echo "
        ";
    }

    public function getTemplateName()
    {
        return "_global/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 26,  77 => 25,  71 => 5,  61 => 31,  56 => 28,  54 => 25,  31 => 5,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "_global/index.html.twig", "C:\\xampp\\htdocs\\views\\_global\\index.html.twig");
    }
}
