<?php

/* twig/block-header-banner2.twig */
class __TwigTemplate_1b7537d0d44a6162a626ef3383e00302067d3930c593e0244f2400446d038ad2 extends Twig_Template
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
        echo "<!-- USED ON BLOG SINGLE, Vactures Single. Leerplatform Single, Elearning Single, Portfolio Single -->
<div class=\"section-header-banner2-wrapper ";
        // line 2
        echo ($context["class"] ?? null);
        echo "\">
\t<section class=\"section-header-banner2\">
\t\t<div class=\"overlay\"></div>
\t\t<div class=\"pattern-bg\"></div>
\t\t<div class=\"inner\">
\t\t\t<div class=\"bgimage\" style=\"background-image: url(";
        // line 7
        echo ($context["background"] ?? null);
        echo ")!important;\"></div>
\t\t\t<div class=\"content-wrapper\">
\t\t\t\t<div class=\"column column1\">
\t\t\t\t\t";
        // line 10
        if (($context["title"] ?? null)) {
            // line 11
            echo "\t\t\t            <h1>";
            echo ($context["title"] ?? null);
            echo "</h1>
\t\t            ";
        }
        // line 13
        echo "\t\t            ";
        if (($context["subtitle"] ?? null)) {
            // line 14
            echo "\t\t            \t<p>";
            echo ($context["subtitle"] ?? null);
            echo "</p>
\t\t            ";
        }
        // line 16
        echo "\t\t            ";
        if (($context["logo_url"] ?? null)) {
            // line 17
            echo "\t\t\t            <p><img src=\"";
            echo ($context["logo_url"] ?? null);
            echo "\" /></p>
\t\t            ";
        }
        // line 19
        echo "\t            </div>

\t            <div class=\"column column2 text-center\">
\t            \t<div class=\"block-author top\">
\t\t            \t";
        // line 23
        if (($context["author_title"] ?? null)) {
            // line 24
            echo "\t\t            \t\t<h3>";
            echo ($context["author_title"] ?? null);
            echo "</h3>
\t\t            \t";
        }
        // line 26
        echo "\t\t            \t";
        if (($context["author_url"] ?? null)) {
            // line 27
            echo "\t\t\t            \t<div class=\"avatar\">
\t\t\t            \t\t<img src=\"";
            // line 28
            echo ($context["author_url"] ?? null);
            echo "\" />
\t\t\t            \t</div>
\t\t\t            ";
        }
        // line 31
        echo "\t\t            \t";
        if (($context["author_description"] ?? null)) {
            // line 32
            echo "\t\t\t\t\t\t\t<p>";
            echo ($context["author_description"] ?? null);
            echo "</p>
\t\t\t\t\t\t";
        }
        // line 34
        echo "\t            \t</div>
\t            </div>
\t        </div>
\t\t</div>
\t</section>

\t<div class=\"block-author bottom\">
\t\t<div class=\"column-author\">
\t\t\t";
        // line 42
        if (($context["author_title"] ?? null)) {
            // line 43
            echo "\t\t\t\t<h3>";
            echo ($context["author_title"] ?? null);
            echo "</h3>
\t\t\t";
        }
        // line 45
        echo "\t\t</div>
\t\t";
        // line 46
        if (($context["author_url"] ?? null)) {
            // line 47
            echo "\t\t<div class=\"column-author\">
\t\t\t<div class=\"avatar\">
\t\t\t\t<img src=\"";
            // line 49
            echo ($context["author_url"] ?? null);
            echo "\" />
\t\t\t</div>
\t\t\t";
            // line 51
            if (($context["author_description"] ?? null)) {
                // line 52
                echo "\t\t\t\t<p>";
                echo ($context["author_description"] ?? null);
                echo "</p>
\t\t\t";
            }
            // line 54
            echo "\t\t</div>
\t\t";
        }
        // line 56
        echo "\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "twig/block-header-banner2.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 56,  137 => 54,  131 => 52,  129 => 51,  124 => 49,  120 => 47,  118 => 46,  115 => 45,  109 => 43,  107 => 42,  97 => 34,  91 => 32,  88 => 31,  82 => 28,  79 => 27,  76 => 26,  70 => 24,  68 => 23,  62 => 19,  56 => 17,  53 => 16,  47 => 14,  44 => 13,  38 => 11,  36 => 10,  30 => 7,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- USED ON BLOG SINGLE, Vactures Single. Leerplatform Single, Elearning Single, Portfolio Single -->
<div class=\"section-header-banner2-wrapper {{class}}\">
\t<section class=\"section-header-banner2\">
\t\t<div class=\"overlay\"></div>
\t\t<div class=\"pattern-bg\"></div>
\t\t<div class=\"inner\">
\t\t\t<div class=\"bgimage\" style=\"background-image: url({{background}})!important;\"></div>
\t\t\t<div class=\"content-wrapper\">
\t\t\t\t<div class=\"column column1\">
\t\t\t\t\t{% if title %}
\t\t\t            <h1>{{title}}</h1>
\t\t            {% endif %}
\t\t            {% if subtitle %}
\t\t            \t<p>{{subtitle}}</p>
\t\t            {% endif %}
\t\t            {% if logo_url %}
\t\t\t            <p><img src=\"{{logo_url}}\" /></p>
\t\t            {% endif %}
\t            </div>

\t            <div class=\"column column2 text-center\">
\t            \t<div class=\"block-author top\">
\t\t            \t{% if author_title %}
\t\t            \t\t<h3>{{author_title}}</h3>
\t\t            \t{% endif %}
\t\t            \t{% if author_url %}
\t\t\t            \t<div class=\"avatar\">
\t\t\t            \t\t<img src=\"{{author_url}}\" />
\t\t\t            \t</div>
\t\t\t            {% endif %}
\t\t            \t{% if author_description %}
\t\t\t\t\t\t\t<p>{{author_description}}</p>
\t\t\t\t\t\t{% endif %}
\t            \t</div>
\t            </div>
\t        </div>
\t\t</div>
\t</section>

\t<div class=\"block-author bottom\">
\t\t<div class=\"column-author\">
\t\t\t{% if author_title %}
\t\t\t\t<h3>{{author_title}}</h3>
\t\t\t{% endif %}
\t\t</div>
\t\t{% if author_url %}
\t\t<div class=\"column-author\">
\t\t\t<div class=\"avatar\">
\t\t\t\t<img src=\"{{author_url}}\" />
\t\t\t</div>
\t\t\t{% if author_description %}
\t\t\t\t<p>{{author_description}}</p>
\t\t\t{% endif %}
\t\t</div>
\t\t{% endif %}
\t</div>
</div>", "twig/block-header-banner2.twig", "/srv/www/splintt.com/current/web/app/themes/oye/twig/block-header-banner2.twig");
    }
}
