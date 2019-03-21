<?php

/* Main/validate.html.twig */
class __TwigTemplate_c3a774614376e4fcd30bd3f1e445c654d7e9570f5062376b6be7696582d98013 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("_global/index.html.twig", "Main/validate.html.twig", 1);
        $this->blocks = [
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

    // line 2
    public function block_message($context, array $blocks = [])
    {
        // line 3
        echo twig_escape_filter($this->env, ($context["message"] ?? null), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "Main/validate.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 3,  32 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Main/validate.html.twig", "C:\\xampp\\htdocs\\Walkadog\\views\\Main\\validate.html.twig");
    }
}
