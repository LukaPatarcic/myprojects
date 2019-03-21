<?php

/* Register/validate.html.twig */
class __TwigTemplate_c213f0ab9ee2da2583de05dad374525861b853796e1b520e1de45e940ac398b3 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("_global/index.html.twig", "Register/validate.html.twig", 1);
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
        return "Register/validate.html.twig";
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
        return new Twig_Source("", "Register/validate.html.twig", "C:\\xampp\\htdocs\\Walkadog\\views\\Register\\validate.html.twig");
    }
}
