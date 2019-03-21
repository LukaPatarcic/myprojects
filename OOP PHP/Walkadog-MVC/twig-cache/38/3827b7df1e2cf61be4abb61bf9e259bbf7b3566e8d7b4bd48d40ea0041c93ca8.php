<?php

/* Main/home.html.twig */
class __TwigTemplate_c302e2a143f84ce86a7a2a6a1cd10077210e6f18da15e4a2b6845d6143d73b11 extends Twig_Template
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
        ob_start();
        // line 5
        echo "<nav>
    <ul>
        ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 8
            echo "        <li>
            <a href=\"category/";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "category_id", []), "html", null, true);
            echo "\">
                ";
            // line 10
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "category_name", []))), "html", null, true);
            echo "
            </a>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "    </ul>
</nav>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 16
        echo "<h3>Current date and time: ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d.m.Y.H.i", "Europe/Belgrade"), "html", null, true);
        echo "</h3>
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
        return array (  66 => 16,  61 => 13,  52 => 10,  48 => 9,  45 => 8,  41 => 7,  37 => 5,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Main/home.html.twig", "C:\\xampp\\htdocs\\views\\Main\\home.html.twig");
    }
}
