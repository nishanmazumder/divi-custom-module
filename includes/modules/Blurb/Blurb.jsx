// External Dependencies
import React, { Component } from "react";

// Internal Dependencies
import "./style.css";

class NMDIVI_BLURB extends Component {
  static slug = "nmdivi_blurb";

  static css(props) {
    let additionalCss = [];

    ///// Content Box  /////
    additionalCss.push([
      {
        selector: "%%order_class%% .featured-box-content",
        declaration: `background-color: ${props.nm_content_box_bg};`,
      },
    ]);

    // Content box padding
    if (props.nm_content_box_space) {
      let content_box_space = props.nm_content_box_space;
      content_box_space = content_box_space.split("|").filter((el) => {
        return el !== "";
      });

      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-content",
          declaration: `padding: ${content_box_space[0]} ${content_box_space[1]} ${content_box_space[2]} ${content_box_space[3]};`,
        },
      ]);
    }

    // Content box margin
    if (props.nm_content_box_space_margin) {
      let content_box_margin = props.nm_content_box_space_margin;
      content_box_margin = content_box_margin.split("|").filter((el) => {
        return el !== "";
      });

      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-content",
          declaration: `margin: ${content_box_margin[0]} ${content_box_margin[1]} ${content_box_margin[2]} ${content_box_margin[3]} !important;`,
        },
      ]);
    }

    // Content box width
    additionalCss.push([
      {
        selector: "%%order_class%% .featured-box-content",
        declaration: `max-width: ${props.nm_content_box_width}; margin: 0px auto;`,
      },
    ]);

    // Content box height
    // additionalCss.push([
    //   {
    //     selector: "%%order_class%% .featured-box-content",
    //     declaration: `max-height: ${props.nm_content_box_height};`,
    //   },
    // ]);

    // Content box position
    if ("on" === props.nm_content_box_overlap) {
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-content",
          declaration: `position: absolute; top: 10%; left: 10%;`,
        },
      ]);
    }

    // position
    if (props.nm_content_box_move_top_bottom) {
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-content",
          declaration: `top: ${props.nm_content_box_move_top_bottom};`,
        },
      ]);
    }

    if (props.nm_content_box_move_left_right) {
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-content",
          declaration: `left: ${props.nm_content_box_move_left_right};`,
        },
      ]);
    }

    // Image
    if ("on|hover" === props.nm_img_bg__hover_enabled) {
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-image",
          declaration: `background-color: ${props.nm_img_bg__hover};`,
        },
      ]);
    } else {
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-image",
          declaration: `background-color: ${props.nm_img_bg};`,
        },
      ]);
    }

    // Padding
    if ("on|hover" === props.nm_img_space__hover_enabled) {
      if (props.nm_img_space__hover) {
        let image_space_hover = props.nm_img_space__hover;
        image_space_hover = image_space_hover.split("|").filter((el) => {
          return el !== "";
        });

        additionalCss.push([
          {
            selector: "%%order_class%% .featured-box-image",
            declaration: `padding: ${image_space_hover[0]} ${image_space_hover[1]} ${image_space_hover[2]} ${image_space_hover[3]};`,
          },
        ]);
      }
    } else {
      if (props.nm_img_space) {
        let image_space = props.nm_img_space;
        image_space = image_space.split("|").filter((el) => {
          return el !== "";
        });

        additionalCss.push([
          {
            selector: "%%order_class%% .featured-box-image",
            declaration: `padding: ${image_space[0]} ${image_space[1]} ${image_space[2]} ${image_space[3]};`,
          },
        ]);
      }
    }

    // margin
    if ("on|hover" === props.nm_img_margin__hover_enabled) {
      if (props.nm_img_margin__hover) {
        let image_margin_hover = props.nm_img_margin__hover;
        image_margin_hover = image_margin_hover.split("|").filter((el) => {
          return el !== "";
        });

        additionalCss.push([
          {
            selector: "%%order_class%% .featured-box-image",
            declaration: `margin: ${image_margin_hover[0]} ${image_margin_hover[1]} ${image_margin_hover[2]} ${image_margin_hover[3]};`,
          },
        ]);
      }
    } else {
      if (props.nm_img_margin) {
        let image_margin = props.nm_img_margin;
        image_margin = image_margin.split("|").filter((el) => {
          return el !== "";
        });

        additionalCss.push([
          {
            selector: "%%order_class%% .featured-box-image",
            declaration: `margin: ${image_margin[0]} ${image_margin[1]} ${image_margin[2]} ${image_margin[3]};`,
          },
        ]);
      }
    }

    ///// Badge //////

    if ("on" === props.nm_badge_enable) {
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-badge",
          declaration: `position: absolute; display: inline-block; background-color: #E09900; top: 45%; left: 90%;`,
        },
        {
          selector: "%%order_class%% .featured-box-badge-icon",
          declaration: `font-size: 24px;`,
        }
      ]);
    } else {
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-badge",
          declaration: `display: none;`,
        },
        {
          selector: "%%order_class%% .featured-box-badge-icon",
          declaration: `display: none;`,
        }
      ]);
    }

    // Padding
    if (props.nm_badge_space) {
      let badge_space = props.nm_badge_space;
      badge_space = badge_space.split("|").filter((el) => {
        return el !== "";
      });

      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-badge",
          declaration: `padding: ${badge_space[0]} ${badge_space[1]} ${badge_space[2]} ${badge_space[3]};`,
        },
      ]);
    }

    if ("on|hover" === props.nm_badge_bg__hover_enabled) {
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-badge",
          declaration: `background-color: ${props.nm_badge_bg__hover};`,
        },
      ]);
    } else {
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-badge",
          declaration: `background-color: ${props.nm_badge_bg};`,
        },
      ]);
    }

    if (props.nm_badge_move_top_bottom) {
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-badge",
          declaration: `top: ${props.nm_badge_move_top_bottom};`,
        },
      ]);
    }

    if (props.nm_badge_move_left_right) {
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-badge",
          declaration: `left: ${props.nm_badge_move_left_right};`,
        },
      ]);
    }

    if ("on" === props.nm_badge_enable) {
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-badge-icon",
          declaration: `font-size: 24px;`,
        },
      ]);

    }

    // if("on" === props.nm_content_box_overlap){
    //         additionalCss.push([
    //       {
    //         selector: "%%order_class%% .featured-box-badge",
    //         declaration: `display: flex; position: absolute; align-items: center; top: auto; left: auto;`,
    //       },
    //     ]);
    // }


    ////// Title //////
    if ("on|hover" === props.nm_title_bg__hover_enabled) {
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-title",
          declaration: `background-color: ${props.nm_title_bg__hover};`,
        },
      ]);
    } else {
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-title",
          declaration: `background-color: ${props.nm_title_bg};`,
        },
      ]);
    }

    // Title Padding

    if ("on|hover" === props.nm_title_space__hover_enabled) {
      if (props.nm_title_space__hover) {
        let title_space_hover = props.nm_title_space__hover;
        title_space_hover = title_space_hover.split("|").filter((el) => {
          return el !== "";
        });

        additionalCss.push([
          {
            selector: "%%order_class%% .featured-box-title",
            declaration: `padding: ${title_space_hover[0]} ${title_space_hover[1]} ${title_space_hover[2]} ${title_space_hover[3]};`,
          },
        ]);
      }
    } else {
      if (props.nm_title_space) {
        let title_space = props.nm_title_space;
        title_space = title_space.split("|").filter((el) => {
          return el !== "";
        });

        additionalCss.push([
          {
            selector: "%%order_class%% .featured-box-title",
            declaration: `padding: ${title_space[0]} ${title_space[1]} ${title_space[2]} ${title_space[3]};`,
          },
        ]);
      }
    }

    // Title Margin nm_title_space_margin__hover

    if ("on|hover" === props.nm_title_space_margin__hover_enabled) {
      if (props.nm_title_space_margin__hover) {
        let title_margin_hover = props.nm_title_space_margin__hover;
        title_margin_hover = title_margin_hover.split("|").filter((el) => {
          return el !== "";
        });

        additionalCss.push([
          {
            selector: "%%order_class%% .featured-box-title",
            declaration: `margin: ${title_margin_hover[0]} ${title_margin_hover[1]} ${title_margin_hover[2]} ${title_margin_hover[3]};`,
          },
        ]);
      }
    } else {
      if (props.nm_title_space_margin) {
        let title_margin = props.nm_title_space_margin;
        title_margin = title_margin.split("|").filter((el) => {
          return el !== "";
        });

        additionalCss.push([
          {
            selector: "%%order_class%% .featured-box-title",
            declaration: `margin: ${title_margin[0]} ${title_margin[1]} ${title_margin[2]} ${title_margin[3]};`,
          },
        ]);
      }
    }

    ////// Subtitle //////
    if('on' !== props.nm_subtitle_active){
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-subtitle",
          declaration: `display: none;`,
        },
      ]);
    }
    if ("on|hover" === props.nm_sub_title_bg__hover_enabled) {
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-subtitle",
          declaration: `background-color: ${props.nm_sub_title_bg__hover};`,
        },
      ]);
    } else {
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-subtitle",
          declaration: `background-color: ${props.nm_sub_title_bg};`,
        },
      ]);
    }

    if (props.nm_sub_title_space) {
      let subtitle_space = props.nm_sub_title_space;
      subtitle_space = subtitle_space.split("|").filter((el) => {
        return el !== "";
      });

      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-subtitle",
          declaration: `padding: ${subtitle_space[0]} ${subtitle_space[1]} ${subtitle_space[2]} ${subtitle_space[3]};`,
        },
      ]);
    }

    if (props.nm_sub_title_margin) {
      let subtitle_margin = props.nm_sub_title_margin;
      subtitle_margin = subtitle_margin.split("|").filter((el) => {
        return el !== "";
      });

      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-subtitle",
          declaration: `margin: ${subtitle_margin[0]} ${subtitle_margin[1]} ${subtitle_margin[2]} ${subtitle_margin[3]};`,
        },
      ]);
    }

    ///// Content /////
    if ("on|hover" === props.nm_content_bg__hover_enabled) {
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-text",
          declaration: `background-color: ${props.nm_content_bg__hover};`,
        },
      ]);
    } else {
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-text",
          declaration: `background-color: ${props.nm_content_bg} !important;`,
        },
      ]);
    }

    // Content padding
    if (props.nm_content_space) {
      let content_space = props.nm_content_space;
      content_space = content_space.split("|").filter((el) => {
        return el !== "";
      });

      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-text",
          declaration: `padding: ${content_space[0]} ${content_space[1]} ${content_space[2]} ${content_space[3]};`,
        },
      ]);
    }

    // Content Margin
    if (props.nm_content_space_margin) {
      let content_margin = props.nm_content_space_margin;
      content_margin = content_margin.split("|").filter((el) => {
        return el !== "";
      });

      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-text",
          declaration: `margin: ${content_margin[0]} ${content_margin[1]} ${content_margin[2]} ${content_margin[3]};`,
        },
      ]);
    }

    ///// Image /////
    additionalCss.push([
      {
        selector: "%%order_class%% .featured-box-image img",
        declaration: `width: ${props.nm_img_width} !important;`,
      },
      {
        selector: "%%order_class%% .featured-box-image",
        declaration: `text-align: ${props.nm_img_align} !important;`,
      },
    ]);

    ///// Button /////
    if ("on|hover" === props.nm_btn_bg__hover_enabled) {
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-button",
          declaration: `background-color: ${props.nm_btn_bg__hover};`,
        },
      ]);
    } else {
      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-button",
          declaration: `background-color: ${props.nm_btn_bg};`,
        },
      ]);
    }

    // Button Space
    if (props.nm_button_space) {
      let button_space = props.nm_button_space;
      button_space = button_space.split("|").filter((el) => {
        return el !== "";
      });

      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-button",
          declaration: `padding: ${button_space[0]} ${button_space[1]} ${button_space[2]} ${button_space[3]};`,
        },
      ]);
    }

    if (props.nm_button_space_margin) {
      let button_margin = props.nm_button_space_margin;
      button_margin = button_margin.split("|").filter((el) => {
        return el !== "";
      });

      additionalCss.push([
        {
          selector: "%%order_class%% .featured-box-button",
          declaration: `margin: ${button_margin[0]} ${button_margin[1]} ${button_margin[2]} ${button_margin[3]};`,
        },
      ]);
    }

    console.log(props);

    return additionalCss;
  }

  // Render button
  render_button = () => {
    const utils = window.ET_Builder.API.Utils;
    const btn_text = this.props.nm_btn;
    const btn_url = this.props.nm_btn_url;
    const btn_target =
      "on" === this.props.nm_btn_url_new_window ? "_blank" : "";
    const btn_icon = this.props.nm_button_icon
      ? utils.processFontIcon(this.props.nm_button_icon)
      : false;
    const btn_class = {
      et_pb_button: true,
      et_pb_custom_button_icon: this.props.nm_button_icon,
    };

    let button_full_width =
      this.props.nm_btn_full_width === "on"
        ? " display-block"
        : " display-inline-block";

    if (!btn_text || !btn_url) return "";

    return (
      <div className="featured-box-button">
        <a
          className={
            utils.classnames(btn_class) +
            button_full_width +
            " featured-box-readmore"
          } //featured-box-readmore display-inline-block
          href={btn_url}
          target={btn_target}
          rel={utils.linkRel(this.props.button_rel)}
          data-icon={btn_icon}
        >
          {btn_text}
        </a>
      </div>
    );
  };

  // Render icon
  render_icon = () => {
    const utils = window.ET_Builder.API.Utils;
    const badge = this.props.nm_badge;
    let badge_icon = this.props.nm_badge_icon;
    badge_icon = utils.processFontIcon(badge_icon);

    return (
      <div className="featured-box-badge">
        {badge}
        <span className="et-pb-icon featured-box-badge-icon">{badge_icon}</span>
      </div>
    );
  };

  render() {
    const title = this.props.nm_title;
    const subtitle = this.props.nm_sub_title;
    // const content = this.render_content(this.props, "nm_content");
    const content = this.props.dynamic["nm_content"].render("full");
    const img = this.props.nm_img;
    const img_alt = this.props.nm_img_alt_text;

    return (
      <>
        <div className="featured-box featured-box-default">
          <div className="featured-box-image">
            <div className="image-mask">
              <img src={img} alt={img_alt} />
            </div>
          </div>
          <div className="featured-box-content">
            {this.render_icon()}
            <h3 className="featured-box-title">
              <span>{title}</span>
            </h3>
            <h5 className="featured-box-subtitle">
              <span>{subtitle}</span>
            </h5>
            <div className="featured-box-text">{content}</div>
            {this.render_button()}
          </div>
        </div>
      </>
    );
  }
}

export default NMDIVI_BLURB;
