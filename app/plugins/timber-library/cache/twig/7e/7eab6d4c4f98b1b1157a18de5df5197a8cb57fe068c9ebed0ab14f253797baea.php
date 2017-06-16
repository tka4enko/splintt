<?php

/* twig/block-header-banner.twig */
class __TwigTemplate_e38979abb2fe867cd5b75404708b59590aec605973dc0c8e4226f367c29967bc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!-- Used on contact, Wij-zijn-de-splinters, Werken-bij Overview, Portfolio Overview -->
";
        // line 2
        if ((($context["header_image_url"] ?? null) != null)) {
            // line 3
            echo "\t<style type=\"text/css\">
\t\t.bgimage{
\t\t\tbackground-image: url('";
            // line 5
            echo ($context["header_image_url"] ?? null);
            echo "') !important;
\t\t}

\t\t@media screen and (max-width: 767px) {
\t\t\t.bgimage{
\t\t\t\tbackground-image: url('";
            // line 10
            echo ($context["header_mobile_image_url"] ?? null);
            echo "') !important;
\t\t\t}
\t\t}
\t</style>
";
        }
        // line 15
        echo "
<section class=\"section-header-banner ";
        // line 16
        echo ($context["class"] ?? null);
        echo "\">
\t<div class=\"overlay\"></div>
\t<div class=\"pattern-bg\"></div>
\t<div class=\"inner\">
\t\t<div class=\"bgimage\"></div>

\t\t<div class=\"content-wrapper\">
            <h1 class=\"font-soho-medium\">";
        // line 23
        echo ($context["title"] ?? null);
        echo "</h1>
            <p>";
        // line 24
        echo ($context["subtitle"] ?? null);
        echo "</p>
            ";
        // line 25
        echo ($context["button"] ?? null);
        echo "
        </div>
\t</div>
</section>";
    }

    public function getTemplateName()
    {
        return "twig/block-header-banner.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 25,  61 => 24,  57 => 23,  47 => 16,  44 => 15,  36 => 10,  28 => 5,  24 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- Used on contact, Wij-zijn-de-splinters, Werken-bij Overview, Portfolio Overview -->
{% if header_image_url != null %}
\t<style type=\"text/css\">
\t\t.bgimage{
\t\t\tbackground-image: url('{{header_image_url}}') !important;
\t\t}

\t\t@media screen and (max-width: 767px) {
\t\t\t.bgimage{
\t\t\t\tbackground-image: url('{{header_mobile_image_url}}') !important;
\t\t\t}
\t\t}
\t</style>
{% endif %}

<section class=\"section-header-banner {{class}}\">
\t<div class=\"overlay\"></div>
\t<div class=\"pattern-bg\"></div>
\t<div class=\"inner\">
\t\t<div class=\"bgimage\"></div>

\t\t<div class=\"content-wrapper\">
            <h1 class=\"font-soho-medium\">{{title}}</h1>
            <p>{{subtitle}}</p>
            {{button}}
        </div>
\t</div>
</section>", "twig/block-header-banner.twig", "/srv/www/splintt.com/current/web/app/themes/oye/twig/block-header-banner.twig");
    }
}
