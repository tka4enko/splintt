<?php

/* twig/leerplatform-data.twig */
class __TwigTemplate_2878d5a159f9a5fa0af2b9969ee81a2f3c3f2e1a5edc6140cc0fbc69ede8a5fe extends Twig_Template
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
        echo "<div class=\"page-slide\">
\t<div class=\"singlepage_menu\">
\t\t";
        // line 3
        echo ($context["topmenu"] ?? null);
        echo "
\t\t";
        // line 4
        echo ($context["selectmenu"] ?? null);
        echo "
\t    <div data-sectionhash=\"";
        // line 5
        echo ($context["sectionhash"] ?? null);
        echo "\" class=\"close_singlepage_menu\">
\t    \t<a data-overview=\"";
        // line 6
        echo ($context["urlhistory"] ?? null);
        echo "\" href=\"";
        echo ($context["backurl"] ?? null);
        echo "\" class=\"page-popup-wrapper_close\" id=\"close_singlepage_menu\">";
        echo ($context["sluiten"] ?? null);
        echo " <i class=\"iconc-close\"></i></a>\t
\t    </div>
\t</div>
\t<div class=\"page-slide-wrapper\" id=\"page-slide-wrapper\">
\t\t";
        // line 10
        echo ($context["bannerheader"] ?? null);
        echo "

\t\t<div class=\"main-content\">
\t\t\t<div class=\"container-custom py50 xs-pb0\">
\t\t\t\t";
        // line 14
        echo ($context["leerposts"] ?? null);
        echo "
\t\t\t</div>
\t\t</div>
\t\t";
        // line 17
        echo ($context["footerdata"] ?? null);
        echo "
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "twig/leerplatform-data.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 17,  53 => 14,  46 => 10,  35 => 6,  31 => 5,  27 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"page-slide\">
\t<div class=\"singlepage_menu\">
\t\t{{topmenu}}
\t\t{{selectmenu}}
\t    <div data-sectionhash=\"{{sectionhash}}\" class=\"close_singlepage_menu\">
\t    \t<a data-overview=\"{{urlhistory}}\" href=\"{{backurl}}\" class=\"page-popup-wrapper_close\" id=\"close_singlepage_menu\">{{sluiten}} <i class=\"iconc-close\"></i></a>\t
\t    </div>
\t</div>
\t<div class=\"page-slide-wrapper\" id=\"page-slide-wrapper\">
\t\t{{bannerheader}}

\t\t<div class=\"main-content\">
\t\t\t<div class=\"container-custom py50 xs-pb0\">
\t\t\t\t{{leerposts}}
\t\t\t</div>
\t\t</div>
\t\t{{footerdata}}
\t</div>
</div>", "twig/leerplatform-data.twig", "/srv/www/splintt.com/current/web/app/themes/oye/twig/leerplatform-data.twig");
    }
}
