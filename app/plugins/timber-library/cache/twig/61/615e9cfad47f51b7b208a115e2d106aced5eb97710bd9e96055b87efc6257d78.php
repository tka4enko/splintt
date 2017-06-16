<?php

/* twig/homepage/homepage_recent_blog.twig */
class __TwigTemplate_5f285040f7d1a03e56302989c1a914a2a6657bf91aeefc4b55786258064482df extends Twig_Template
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
        echo "<section class=\"leuk-leren-section\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-xs-12 text-center\">
                <h2 class=\"pink\">";
        // line 5
        echo $this->getAttribute(($context["info"] ?? null), "blogposts_title", array());
        echo "</h2>
            </div>
        </div>
    </div>
    ";
        // line 9
        if ($this->getAttribute(($context["info"] ?? null), "background_image", array(), "any", true, true)) {
            // line 10
            echo "        <div class=\"image-background\" style=\"background-image:url('";
            echo $this->getAttribute(($context["info"] ?? null), "background_image", array());
            echo "'); background-repeat: no-repeat; background-size: cover; background-position: center;\">
        ";
        } else {
            // line 12
            echo "            <div class=\"image-background\">
            ";
        }
        // line 14
        echo "            <div class=\"image-gradient\">
                <div class=\"container\">
                    <div class=\"row\">
                        ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["posts"] ?? null));
        foreach ($context['_seq'] as $context["id"] => $context["post"]) {
            // line 18
            echo "                            <div class=\"col-xs-12 col-sm-6 padding-right small-padding\">
                                <div class=\"";
            // line 19
            echo $this->getAttribute($context["post"], "class", array());
            echo " xs-block check-clippath\" ";
            echo ">
                                    <h3>";
            // line 20
            echo $this->getAttribute($context["post"], "title", array());
            echo "</h3>
                                    <span class=\"font-soho mr15\">";
            // line 21
            echo $this->getAttribute($context["post"], "date", array());
            echo "</span>
                                    <span class=\"font-soho post-leestijd\"><i class=\"iconc-clock mr5\"></i> ";
            // line 22
            echo ($context["leestijd"] ?? null);
            echo " ";
            echo $this->getAttribute($context["post"], "leestijd", array());
            echo "</span>
                                    <p>";
            // line 23
            echo $this->getAttribute($context["post"], "excerpt", array());
            echo "</p>
                                    <div class=\"post-author\">
                                        <div class=\"post-author-inner\">
                                            <div class=\"author-detail\">
                                                <div class=\"author-avatar\">
                                                    <img src=\"";
            // line 28
            echo $this->getAttribute($context["post"], "avatarurl", array());
            echo "\" />
                                                </div>
                                                <span class=\"author-title\">
                                                    <div>";
            // line 31
            echo ($context["door"] ?? null);
            echo "</div>
                                                    <div class=\"author-name\">";
            // line 32
            echo $this->getAttribute($context["post"], "author", array());
            echo "</div>
                                                </span>
                                            </div>
                                            <div class=\"post-link text-right\">
                                                <a class=\"btn btn-nobg font-soho-medium\" href=\"";
            // line 36
            echo $this->getAttribute($context["post"], "link", array());
            echo "\">";
            echo ($context["lees"] ?? null);
            echo " <i class=\"iconc-arrow-button\"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "                    </div>
                    <div class=\"row\">
                        <div class=\"col-xs-12 text-center\">
                            <div class=\"wie-zijnBtn-div\">
                                <a href=\"";
        // line 47
        echo $this->getAttribute(($context["info"] ?? null), "overviewlink", array());
        echo "\" class=\"btn btn-pink\">";
        echo ($context["meer_blogs_lezen"] ?? null);
        echo "<i class=\"iconc-arrow-button\"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "twig/homepage/homepage_recent_blog.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 47,  115 => 43,  100 => 36,  93 => 32,  89 => 31,  83 => 28,  75 => 23,  69 => 22,  65 => 21,  61 => 20,  56 => 19,  53 => 18,  49 => 17,  44 => 14,  40 => 12,  34 => 10,  32 => 9,  25 => 5,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<section class=\"leuk-leren-section\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-xs-12 text-center\">
                <h2 class=\"pink\">{{info.blogposts_title}}</h2>
            </div>
        </div>
    </div>
    {%if info.background_image is defined%}
        <div class=\"image-background\" style=\"background-image:url('{{info.background_image}}'); background-repeat: no-repeat; background-size: cover; background-position: center;\">
        {%else%}
            <div class=\"image-background\">
            {%endif%}
            <div class=\"image-gradient\">
                <div class=\"container\">
                    <div class=\"row\">
                        {% for id, post in posts %}
                            <div class=\"col-xs-12 col-sm-6 padding-right small-padding\">
                                <div class=\"{{post.class}} xs-block check-clippath\" {#style=\"background-color:{{post.bg}};\"#}>
                                    <h3>{{post.title}}</h3>
                                    <span class=\"font-soho mr15\">{{post.date}}</span>
                                    <span class=\"font-soho post-leestijd\"><i class=\"iconc-clock mr5\"></i> {{leestijd}} {{post.leestijd}}</span>
                                    <p>{{post.excerpt}}</p>
                                    <div class=\"post-author\">
                                        <div class=\"post-author-inner\">
                                            <div class=\"author-detail\">
                                                <div class=\"author-avatar\">
                                                    <img src=\"{{post.avatarurl}}\" />
                                                </div>
                                                <span class=\"author-title\">
                                                    <div>{{door}}</div>
                                                    <div class=\"author-name\">{{post.author}}</div>
                                                </span>
                                            </div>
                                            <div class=\"post-link text-right\">
                                                <a class=\"btn btn-nobg font-soho-medium\" href=\"{{post.link}}\">{{lees}} <i class=\"iconc-arrow-button\"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {% endfor %}
                    </div>
                    <div class=\"row\">
                        <div class=\"col-xs-12 text-center\">
                            <div class=\"wie-zijnBtn-div\">
                                <a href=\"{{info.overviewlink}}\" class=\"btn btn-pink\">{{meer_blogs_lezen}}<i class=\"iconc-arrow-button\"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
", "twig/homepage/homepage_recent_blog.twig", "/srv/www/splintt.com/current/web/app/themes/oye/twig/homepage/homepage_recent_blog.twig");
    }
}
