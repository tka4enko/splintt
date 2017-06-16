<?php

/* twig/footer-single.twig */
class __TwigTemplate_6902c71805d29073d4e1edfd2dfeeefa175a30a707f84f95d61cf73247987610 extends Twig_Template
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
        echo "<section class=\"section-before-footer ";
        echo ($context["single_class"] ?? null);
        echo "\">
    <div class=\"pattern-bg\"></div>
    <div class=\"inner\">
        <div class=\"bgimg\" style=\"background-image:url('";
        // line 4
        echo ($context["before_footer_single_image_url"] ?? null);
        echo "')\">

        </div>
        <div class=\"content-wrapper\">
            ";
        // line 8
        echo ($context["before_footer_single_content"] ?? null);
        echo "
            ";
        // line 9
        echo ($context["carousel"] ?? null);
        echo "
        </div>
    </div>
</section>";
    }

    public function getTemplateName()
    {
        return "twig/footer-single.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 9,  33 => 8,  26 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<section class=\"section-before-footer {{single_class}}\">
    <div class=\"pattern-bg\"></div>
    <div class=\"inner\">
        <div class=\"bgimg\" style=\"background-image:url('{{before_footer_single_image_url}}')\">

        </div>
        <div class=\"content-wrapper\">
            {{before_footer_single_content}}
            {{ carousel }}
        </div>
    </div>
</section>", "twig/footer-single.twig", "/srv/www/splintt.com/current/web/app/themes/oye/twig/footer-single.twig");
    }
}
