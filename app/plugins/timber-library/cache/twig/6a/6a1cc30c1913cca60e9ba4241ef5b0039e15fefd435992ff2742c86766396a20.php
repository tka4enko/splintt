<?php

/* twig/portfolio-data.twig */
class __TwigTemplate_7ceb7bb58a76a10f2e1daea8b3f8ccf7a6073a04f1687945246d2bd160b2d288 extends Twig_Template
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
        echo "<div class=\"page-slide portfolioCt\">
\t<div class=\"singlepage_menu\">
\t\t";
        // line 3
        echo ($context["topmenu"] ?? null);
        echo "
\t\t";
        // line 4
        echo ($context["selectmenu"] ?? null);
        echo "
\t    <div class=\"close_singlepage_menu\">
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
\t\t\t<div class=\"container-custom py50\">
\t\t\t\t<div class=\"top-list text-center\">
\t\t\t\t\t<ul class=\"single-portfolio-list\">
\t\t\t\t\t\t<li class=\"fw-sb\">";
        // line 15
        echo ($context["ingezette"] ?? null);
        echo "</li>
\t\t\t\t\t\t";
        // line 16
        echo ($context["listsdata"] ?? null);
        echo "
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t";
        // line 19
        echo ($context["portfoliodata"] ?? null);
        echo "
\t\t\t</div>
\t\t</div>
\t\t";
        // line 22
        echo ($context["footerdata"] ?? null);
        echo "
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "twig/portfolio-data.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 22,  61 => 19,  55 => 16,  51 => 15,  43 => 10,  32 => 6,  27 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"page-slide portfolioCt\">
\t<div class=\"singlepage_menu\">
\t\t{{topmenu}}
\t\t{{selectmenu}}
\t    <div class=\"close_singlepage_menu\">
\t    \t<a data-overview=\"{{urlhistory}}\" href=\"{{backurl}}\" class=\"page-popup-wrapper_close\" id=\"close_singlepage_menu\">{{sluiten}} <i class=\"iconc-close\"></i></a>\t
\t    </div>
\t</div>
\t<div class=\"page-slide-wrapper\" id=\"page-slide-wrapper\">
\t\t{{bannerheader}}
\t\t<div class=\"main-content\">
\t\t\t<div class=\"container-custom py50\">
\t\t\t\t<div class=\"top-list text-center\">
\t\t\t\t\t<ul class=\"single-portfolio-list\">
\t\t\t\t\t\t<li class=\"fw-sb\">{{ingezette}}</li>
\t\t\t\t\t\t{{listsdata}}
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t{{portfoliodata}}
\t\t\t</div>
\t\t</div>
\t\t{{footerdata}}
\t</div>
</div>", "twig/portfolio-data.twig", "/srv/www/splintt.com/current/web/app/themes/oye/twig/portfolio-data.twig");
    }
}
