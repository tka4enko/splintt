<?php

/* twig/block-carousel-referentie.twig */
class __TwigTemplate_a76068b487a78d7b0ddef91643ad1509ac14e6ef14a21053fdbdbcecc58cf9b3 extends Twig_Template
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
        echo "<div class=\"referentieCt\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                ";
        // line 5
        if (($context["title"] ?? null)) {
            // line 6
            echo "                    <h2 class=\"color-pink text-center mt30 mb50\">";
            echo ($context["title"] ?? null);
            echo "</h2>
                ";
        }
        // line 8
        echo "                <div class=\"inner\">
                    <div class=\"left-part\">
                        <div id=\"referentie-carousal\" class=\"carousel slide\" data-ride=\"carousel\">
                            <!--Indicators-->
                            <ol class=\"carousel-indicators\">
                            \t";
        // line 13
        echo ($context["sliderindicators"] ?? null);
        echo "
                            </ol>
                            <div class=\"carousel-inner\" role=\"listbox\">
                            \t";
        // line 16
        echo ($context["slideritems"] ?? null);
        echo "
                            </div>

                            <!--Left and right controls-->
                            <a class=\"left carousel-control\" href=\"#referentie-carousal\" role=\"button\" data-slide=\"prev\">
                                <i class=\"iconc-arrow-left-button\"><span class=\"path1\"></span><span class=\"path2\"></span></i>
                            </a>
                            <a class=\"right carousel-control\" href=\"#referentie-carousal\" role=\"button\" data-slide=\"next\">
                                <i class=\"iconc-arrow-right-button\"><span class=\"path1\"></span><span class=\"path2\"></span></i>
                            </a>
                        </div>
                    </div>
                    <div class=\"right-part\">
                        <i class=\"iconc-horn\"></i>
                        <div class=\"text-part\">
                            <div class=\"auther\">
                                <span class=\"naam\"></span>
                                <span class=\"star\"></span>
                                <!-- <i class=\"iconc-star\"></i>
                                <i class=\"iconc-star\"></i>
                                <i class=\"iconc-star\"></i>
                                <i class=\"iconc-star\"></i>
                                <i class=\"iconc-star\"></i> -->
                            </div>
                            <p class=\"functie\"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
";
        // line 48
        if (($context["show_bottom"] ?? null)) {
            // line 49
            echo "<div class=\"referentie-bottomBoxCt text-center\">
    <h2 class=\"color-pink mb60 mt100\">";
            // line 50
            echo ($context["reftitle"] ?? null);
            echo "</h2>
    <div class=\"referentie-bottomBox-btn\">
        <span><a id=\"referentie_bottom_btn1\" href=\"";
            // line 52
            echo ($context["linkfirst"] ?? null);
            echo "\" class=\"btn btn-pink mr30\">";
            echo ($context["textfirst"] ?? null);
            echo " <i class=\"iconc-arrow-button\"></i></a></span>
        <span><a id=\"referentie_bottom_btn2\" href=\"";
            // line 53
            echo ($context["linksecond"] ?? null);
            echo "\" class=\"btn btn-pink\">";
            echo ($context["textsecond"] ?? null);
            echo " <i class=\"iconc-arrow-button\"></i></a></span>
    </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "twig/block-carousel-referentie.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 53,  91 => 52,  86 => 50,  83 => 49,  81 => 48,  46 => 16,  40 => 13,  33 => 8,  27 => 6,  25 => 5,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"referentieCt\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                {% if title %}
                    <h2 class=\"color-pink text-center mt30 mb50\">{{title}}</h2>
                {% endif %}
                <div class=\"inner\">
                    <div class=\"left-part\">
                        <div id=\"referentie-carousal\" class=\"carousel slide\" data-ride=\"carousel\">
                            <!--Indicators-->
                            <ol class=\"carousel-indicators\">
                            \t{{sliderindicators}}
                            </ol>
                            <div class=\"carousel-inner\" role=\"listbox\">
                            \t{{slideritems}}
                            </div>

                            <!--Left and right controls-->
                            <a class=\"left carousel-control\" href=\"#referentie-carousal\" role=\"button\" data-slide=\"prev\">
                                <i class=\"iconc-arrow-left-button\"><span class=\"path1\"></span><span class=\"path2\"></span></i>
                            </a>
                            <a class=\"right carousel-control\" href=\"#referentie-carousal\" role=\"button\" data-slide=\"next\">
                                <i class=\"iconc-arrow-right-button\"><span class=\"path1\"></span><span class=\"path2\"></span></i>
                            </a>
                        </div>
                    </div>
                    <div class=\"right-part\">
                        <i class=\"iconc-horn\"></i>
                        <div class=\"text-part\">
                            <div class=\"auther\">
                                <span class=\"naam\"></span>
                                <span class=\"star\"></span>
                                <!-- <i class=\"iconc-star\"></i>
                                <i class=\"iconc-star\"></i>
                                <i class=\"iconc-star\"></i>
                                <i class=\"iconc-star\"></i>
                                <i class=\"iconc-star\"></i> -->
                            </div>
                            <p class=\"functie\"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{% if show_bottom %}
<div class=\"referentie-bottomBoxCt text-center\">
    <h2 class=\"color-pink mb60 mt100\">{{reftitle}}</h2>
    <div class=\"referentie-bottomBox-btn\">
        <span><a id=\"referentie_bottom_btn1\" href=\"{{linkfirst}}\" class=\"btn btn-pink mr30\">{{textfirst}} <i class=\"iconc-arrow-button\"></i></a></span>
        <span><a id=\"referentie_bottom_btn2\" href=\"{{linksecond}}\" class=\"btn btn-pink\">{{textsecond}} <i class=\"iconc-arrow-button\"></i></a></span>
    </div>
</div>
{% endif %}", "twig/block-carousel-referentie.twig", "/srv/www/splintt.com/current/web/app/themes/oye/twig/block-carousel-referentie.twig");
    }
}
