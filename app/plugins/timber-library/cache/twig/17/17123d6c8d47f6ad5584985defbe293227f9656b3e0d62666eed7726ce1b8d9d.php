<?php

/* twig/homepage/homepage_about.twig */
class __TwigTemplate_27b1317c6e8253bdfce60d64ba8d4e537c6c264f90decf5884b70018a3b27919 extends Twig_Template
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
        echo "<section>
<div class=\"splintt-illustration\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"inner text-center\">
                <img src=\"";
        // line 6
        echo $this->getAttribute(($context["about"] ?? null), "image", array());
        echo "\">
                <h2>";
        // line 7
        echo $this->getAttribute(($context["about"] ?? null), "title", array());
        echo "</h2>
                <p> ";
        // line 8
        echo $this->getAttribute(($context["about"] ?? null), "content", array());
        echo "</p>
                <div class=\"e-learningBtn-div\">
                    <a href=\"";
        // line 10
        echo $this->getAttribute(($context["about"] ?? null), "linkleft", array());
        echo "\" class=\"btn btn-pink mr30\">";
        echo $this->getAttribute(($context["about"] ?? null), "textleft", array());
        echo " <i class=\"iconc-arrow-button\"></i></a>
                </div>
                <div class=\"wie-zijnBtn-div\">
                    <a href=\"";
        // line 13
        echo $this->getAttribute(($context["about"] ?? null), "linkright", array());
        echo "\" class=\"btn btn-pink\">";
        echo $this->getAttribute(($context["about"] ?? null), "textright", array());
        echo " <i class=\"iconc-arrow-button\"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>";
    }

    public function getTemplateName()
    {
        return "twig/homepage/homepage_about.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 13,  39 => 10,  34 => 8,  30 => 7,  26 => 6,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<section>
<div class=\"splintt-illustration\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"inner text-center\">
                <img src=\"{{about.image}}\">
                <h2>{{about.title}}</h2>
                <p> {{about.content}}</p>
                <div class=\"e-learningBtn-div\">
                    <a href=\"{{about.linkleft}}\" class=\"btn btn-pink mr30\">{{about.textleft}} <i class=\"iconc-arrow-button\"></i></a>
                </div>
                <div class=\"wie-zijnBtn-div\">
                    <a href=\"{{about.linkright}}\" class=\"btn btn-pink\">{{about.textright}} <i class=\"iconc-arrow-button\"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>", "twig/homepage/homepage_about.twig", "/srv/www/splintt.com/current/web/app/themes/oye/twig/homepage/homepage_about.twig");
    }
}
