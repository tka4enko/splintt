<?php

/* twig/homepage/homepage-quote.twig */
class __TwigTemplate_0b0808fadd326dc1380d7b55e8d8306d29d78e1128fee0dc1f0901f5a44bbc19 extends Twig_Template
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
        echo "<section class=\"leren\">
    <div class=\"container\">
        <div class=\"row hidden-xs\">
            <div class=\" col-xs-12 col-sm-2\"></div>
            <div class=\" col-xs-12 col-sm-10\">
                <div class=\"description\">
                    <div class=\"leren-heading\">
                        <span class=\"fw-b font-calibri-bold\">";
        // line 8
        echo ($context["leren_en_groeien"] ?? null);
        echo "</span>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row\">
            <div class=\" col-xs-12 col-sm-2\">
                <figure class=\"\">
                    <img src=\"";
        // line 16
        echo ($context["homepage_quote_image"] ?? null);
        echo "\">
                </figure>
            </div>
            <div class=\" col-xs-12 col-sm-10\">
                <div class=\"description\">
                    <div class=\"leren-heading visible-xs\">
                        <span class=\"fw-b font-calibri-bold\">";
        // line 22
        echo ($context["leren_en_groeien"] ?? null);
        echo "</span>
                    </div>
                    <p class=\"font-calibri\">";
        // line 24
        echo ($context["homepage_quote_text"] ?? null);
        echo "</p>
                </div>
            </div>
        </div>
    </div>
    <div class=\"text-center\"><a href=\"";
        // line 29
        echo ($context["neiuws_page_url"] ?? null);
        echo "\" class=\"btn btn-pink my40\">";
        echo ($context["neiuws_page_text"] ?? null);
        echo "<i class=\"iconc-arrow-button\"></i></a></div>
</section>";
    }

    public function getTemplateName()
    {
        return "twig/homepage/homepage-quote.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 29,  53 => 24,  48 => 22,  39 => 16,  28 => 8,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<section class=\"leren\">
    <div class=\"container\">
        <div class=\"row hidden-xs\">
            <div class=\" col-xs-12 col-sm-2\"></div>
            <div class=\" col-xs-12 col-sm-10\">
                <div class=\"description\">
                    <div class=\"leren-heading\">
                        <span class=\"fw-b font-calibri-bold\">{{leren_en_groeien}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row\">
            <div class=\" col-xs-12 col-sm-2\">
                <figure class=\"\">
                    <img src=\"{{homepage_quote_image}}\">
                </figure>
            </div>
            <div class=\" col-xs-12 col-sm-10\">
                <div class=\"description\">
                    <div class=\"leren-heading visible-xs\">
                        <span class=\"fw-b font-calibri-bold\">{{leren_en_groeien}}</span>
                    </div>
                    <p class=\"font-calibri\">{{homepage_quote_text}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class=\"text-center\"><a href=\"{{neiuws_page_url}}\" class=\"btn btn-pink my40\">{{neiuws_page_text}}<i class=\"iconc-arrow-button\"></i></a></div>
</section>", "twig/homepage/homepage-quote.twig", "/srv/www/splintt.com/current/web/app/themes/oye/twig/homepage/homepage-quote.twig");
    }
}
