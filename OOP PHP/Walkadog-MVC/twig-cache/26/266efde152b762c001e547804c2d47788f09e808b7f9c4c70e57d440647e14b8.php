<?php

/* Main/home.html.twig */
class __TwigTemplate_71bbb13583712e6f927bb2d1535ccc992768d6499801e9336dc95fbc499fd95c extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("_global/index.html.twig", "Main/home.html.twig", 1);
        $this->blocks = [
            'main' => [$this, 'block_main'],
            'message' => [$this, 'block_message'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "_global/index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = [])
    {
        // line 4
        echo "    ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["breed"] ?? null), "breed", []), "html", null, true);
        echo "
";
    }

    // line 7
    public function block_message($context, array $blocks = [])
    {
        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, ($context["message"] ?? null), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "Main/home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 8,  43 => 7,  36 => 4,  33 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Main/home.html.twig", "C:\\xampp\\htdocs\\Walkadog\\views\\Main\\home.html.twig");
    }
}
