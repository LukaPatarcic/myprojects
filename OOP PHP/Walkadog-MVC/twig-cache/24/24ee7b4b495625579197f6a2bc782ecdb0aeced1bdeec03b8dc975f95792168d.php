<?php

/* Review/home.html.twig */
class __TwigTemplate_a98c3c3ea584ce0a6bed5659478b734688dd10120c75b04f62c221f5c1f13e4c extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $this->loadTemplate("_global/header.html.twig", "Review/home.html.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"clearfix\"></div>
<!-- breadcrumb start -->
<section class=\"breadcrumb\" style=\"background: url(images/dogBoneBackground.jpg) no-repeat center;\">
    <div class=\"breadcrumb-overlay\"></div>
    <div class=\"breadcrumb-title\">
        <h1>Your review</h1>
    </div>
</section>
<!-- breadcrumb end -->

<!--error-->
<div class=\"page error404-page\">
    <div class=\"error-page\">
        <div class=\"container\">
            <div class=\"reviewpage\">
                <form method=\"post\" action=\"includes/review.inc.php\">
                    <div class=\"form-group\">
                        <label for=\"reviewCode\" class=\"reviewLabel\">Review Code</label>
                        <input type=\"text\" class=\"form-control textarea input-lg\" id=\"reviewCode\" maxlength=\"10\" size=\"10\" name=\"code\">
                    </div>
                    <div class=\"form-group\">
                        <label for=\"reviewMessage\" class=\"reviewLabelComment\">Your comment</label>
                        <textarea class=\"form-control textarea\" rows=\"5\" id=\"reviewMessage\" placeholder=\"Enter your comment\" name=\"comment\" maxlength=\"100\"></textarea>
                    </div>
                    <button type=\"submit\" class=\"btn btn-primary\" name=\"submit\">Send</button>
                    <br><br>
                    <span class=\"newsletter-error\">

                     </span>
                </form>
            </div>
        </div>
    </div>
</div>
";
        // line 37
        $this->loadTemplate("_global/footer.html.twig", "Review/home.html.twig", 37)->display($context);
    }

    public function getTemplateName()
    {
        return "Review/home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 37,  25 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Review/home.html.twig", "C:\\xampp\\htdocs\\Walkadog\\views\\Review\\home.html.twig");
    }
}
