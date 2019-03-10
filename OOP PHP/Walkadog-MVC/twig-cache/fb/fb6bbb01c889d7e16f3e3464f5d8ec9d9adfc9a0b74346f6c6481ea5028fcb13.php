<?php

/* Auction/show.html.twig.twig */
class __TwigTemplate_e033daef03dee72afcca17ad4eb74f4d950b4f32cd812e6dfecfc4a7af2c8db2 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("_global/index.html.twig", "Auction/show.html.twig.twig", 1);
        $this->blocks = [
            'title' => [$this, 'block_title'],
            'main' => [$this, 'block_main'],
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
    public function block_title($context, array $blocks = [])
    {
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["auction"] ?? null), "title", []));
        echo "
";
    }

    // line 7
    public function block_main($context, array $blocks = [])
    {
        // line 8
        echo "    <h1>";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["auction"] ?? null), "title", []));
        echo "</h1>
    <p>";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["auction"] ?? null), "description", []), "html", null, true);
        echo "</p>
    <p>";
        // line 10
        echo twig_escape_filter($this->env, ($context["lastOfferPrice"] ?? null), "html", null, true);
        echo " \$</p>

";
    }

    public function getTemplateName()
    {
        return "Auction/show.html.twig.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 10,  50 => 9,  45 => 8,  42 => 7,  36 => 4,  33 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Auction/show.html.twig.twig", "C:\\xampp\\htdocs\\views\\Auction\\show.html.twig.twig");
    }
}
