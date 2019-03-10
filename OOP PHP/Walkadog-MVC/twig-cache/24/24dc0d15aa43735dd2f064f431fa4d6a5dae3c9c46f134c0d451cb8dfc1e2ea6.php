<?php

/* Category/show.html.twig */
class __TwigTemplate_b6b67001dda948302c0cc935995927172dd384e449a01187871275acbca9fec7 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("_global/index.html.twig", "Category/show.html.twig", 1);
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
        echo "    ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["category"] ?? null), "category_name", []));
        echo "
";
    }

    // line 7
    public function block_main($context, array $blocks = [])
    {
        // line 8
        echo "    <h1>";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["category"] ?? null), "category_name", []));
        echo "</h1>
    <h4>List of Auctions in this Category</h4>
    <ul>
        ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["auctionsInCategory"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["auction"]) {
            // line 12
            echo "            <li>
                <a href=\"";
            // line 13
            echo twig_escape_filter($this->env, ($context["BASE"] ?? null), "html", null, true);
            echo "auction/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["auction"], "auction_id", []), "html", null, true);
            echo "\">
                    ";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["auction"], "title", []));
            echo "
                </a><br>
                <small>";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["auction"], "description", []), "html", null, true);
            echo "</small>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['auction'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "    </ul>

";
    }

    public function getTemplateName()
    {
        return "Category/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 18,  71 => 16,  66 => 14,  60 => 13,  57 => 12,  53 => 11,  46 => 8,  43 => 7,  36 => 4,  33 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Category/show.html.twig", "C:\\xampp\\htdocs\\MVC\\views\\Category\\show.html.twig");
    }
}
