<?php

/* twig/homepage/homepage_recent_portfolio.twig */
class __TwigTemplate_5b006616e1632369d7dccb35ed26ad5d36625459c77c7d14b3c6e8a8e5eaca9f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            '__internal_5a4bc72d3ba53d4816daf69a557366c00273c0822ea81d9cb778b76174fc82b6' => array($this, 'block___internal_5a4bc72d3ba53d4816daf69a557366c00273c0822ea81d9cb778b76174fc82b6'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<section class=\"wrapper-boxes-and-carousel\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-xs-12 text-center\">
                <h2 class=\"pink\">";
        // line 5
        echo ($context["homepage_recent_projecten_title"] ?? null);
        echo "</h2>
            </div>
        </div>
    </div>
    <div class=\"wrapper-image-background\">
        <figure>
            <img  class=\"pattern\" src=\"";
        // line 11
        echo $this->getAttribute(($context["portfolio"] ?? null), "pattern", array());
        echo "\">
        </figure>
        <div class=\"container\">
            <div class=\"row\">
                ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["portfolios"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 16
            echo "                    ";
            if (($this->getAttribute($context["post"], "position", array()) == "left")) {
                // line 17
                echo "                        <div class=\"col-xs-12 col-sm-6 no-padding\">
                            <div class=\"left-box check-clippath\">
                                <div class=\"top-content matchHeight\">
                                    <p class=\"text font-soho\">";
                // line 20
                echo $this->getAttribute($context["post"], "heading", array());
                echo "</p>
                                    <p class=\"small font-calibri\">";
                // line 21
                echo $this->getAttribute($context["post"], "text_after_title", array());
                echo "</p>
                                    <figure>
                                        <img src=\"";
                // line 23
                echo $this->getAttribute($context["post"], "logo", array());
                echo "\"/>
                                    </figure>
                                    <a href=\"";
                // line 25
                echo $this->getAttribute($context["post"], "link", array());
                echo "?cpage=";
                echo ($context["currentpage"] ?? null);
                echo "\" class=\"btn btn-nobg btn-box\">";
                echo $this->getAttribute($context["post"], "button", array());
                echo "<i class=\"iconc-arrow-button\"></i></a>
                                </div>
                                ";
                // line 28
                echo "                            </div>
                        </div>
                    ";
            } else {
                // line 31
                echo "                        <div class=\" col-xs-12 col-sm-6 no-padding\">
                            <div class=\"right-box check-clippath\">
                                ";
                // line 34
                echo "                                <div class=\"bottom-content matchHeight\" style=\"padding-bottom:30px;\">
                                    <p class=\"text font-soho\">";
                // line 35
                echo $this->getAttribute($context["post"], "heading", array());
                echo "</p>
                                    <p class=\"small font-calibri\">";
                // line 36
                echo $this->getAttribute($context["post"], "text_after_title", array());
                echo "</p>
                                    <figure>
                                        <img src=\"";
                // line 38
                echo $this->getAttribute($context["post"], "logo", array());
                echo "\"/>
                                    </figure>
                                    <a href=\"";
                // line 40
                echo $this->getAttribute($context["post"], "link", array());
                echo "?cpage=";
                echo ($context["currentpage"] ?? null);
                echo "\" class=\"btn btn-nobg btn-box\">";
                echo $this->getAttribute($context["post"], "button", array());
                echo "<i class=\"iconc-arrow-button\"></i></a>
                                </div>
                            </div>
                        </div>
                    ";
            }
            // line 45
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "            </div>
        </div>
        ";
        // line 48
        echo do_shortcode(        $this->renderBlock("__internal_5a4bc72d3ba53d4816daf69a557366c00273c0822ea81d9cb778b76174fc82b6", $context, $blocks));
        // line 51
        echo "    </div>
</section>";
    }

    // line 48
    public function block___internal_5a4bc72d3ba53d4816daf69a557366c00273c0822ea81d9cb778b76174fc82b6($context, array $blocks = array())
    {
        // line 49
        echo "            [reviewbox_post_block class=\"\"]
        ";
    }

    public function getTemplateName()
    {
        return "twig/homepage/homepage_recent_portfolio.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 49,  132 => 48,  127 => 51,  125 => 48,  121 => 46,  115 => 45,  103 => 40,  98 => 38,  93 => 36,  89 => 35,  86 => 34,  82 => 31,  77 => 28,  68 => 25,  63 => 23,  58 => 21,  54 => 20,  49 => 17,  46 => 16,  42 => 15,  35 => 11,  26 => 5,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<section class=\"wrapper-boxes-and-carousel\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-xs-12 text-center\">
                <h2 class=\"pink\">{{homepage_recent_projecten_title}}</h2>
            </div>
        </div>
    </div>
    <div class=\"wrapper-image-background\">
        <figure>
            <img  class=\"pattern\" src=\"{{portfolio.pattern}}\">
        </figure>
        <div class=\"container\">
            <div class=\"row\">
                {% for post in portfolios %}
                    {%if post.position == 'left'%}
                        <div class=\"col-xs-12 col-sm-6 no-padding\">
                            <div class=\"left-box check-clippath\">
                                <div class=\"top-content matchHeight\">
                                    <p class=\"text font-soho\">{{post.heading}}</p>
                                    <p class=\"small font-calibri\">{{post.text_after_title}}</p>
                                    <figure>
                                        <img src=\"{{post.logo}}\"/>
                                    </figure>
                                    <a href=\"{{post.link}}?cpage={{currentpage}}\" class=\"btn btn-nobg btn-box\">{{post.button}}<i class=\"iconc-arrow-button\"></i></a>
                                </div>
                                {# <div class=\"feature-data\" style=\"background-image: url('{{post.image}}')\"></div> #}
                            </div>
                        </div>
                    {%else%}
                        <div class=\" col-xs-12 col-sm-6 no-padding\">
                            <div class=\"right-box check-clippath\">
                                {# <div class=\"feature-data\" style=\"background-image: url('{{post.image}}')\"></div> #}
                                <div class=\"bottom-content matchHeight\" style=\"padding-bottom:30px;\">
                                    <p class=\"text font-soho\">{{post.heading}}</p>
                                    <p class=\"small font-calibri\">{{post.text_after_title}}</p>
                                    <figure>
                                        <img src=\"{{post.logo}}\"/>
                                    </figure>
                                    <a href=\"{{post.link}}?cpage={{currentpage}}\" class=\"btn btn-nobg btn-box\">{{post.button}}<i class=\"iconc-arrow-button\"></i></a>
                                </div>
                            </div>
                        </div>
                    {%endif%}
                {% endfor %}
            </div>
        </div>
        {% filter shortcodes %}
            [reviewbox_post_block class=\"\"]
        {% endfilter %}
    </div>
</section>", "twig/homepage/homepage_recent_portfolio.twig", "/srv/www/splintt.com/current/web/app/themes/oye/twig/homepage/homepage_recent_portfolio.twig");
    }
}
