// External Dependencies
import React, { Component } from "react";

// Internal Dependencies
import "./style.css";

class NMDIVI_BLURB extends Component {
  static slug = "nmdivi_blurb";

  // constructor(props){
  //   super(props);

  //   this.state = {
  //     title_space: {}
  //   }
  // }

  static css(props) {
    let additionalCss = [];

    // Title BG
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

    // Title Space
    let title_space = props.nm_title_space;
    title_space = title_space.split("|").filter((el) => {
      return el !== "";
    });

    // console.log(`padding: ${space_val[0]} ${space_val[1]} ${space_val[2]} ${space_val[3]};`)

    additionalCss.push([
      {
        selector: "%%order_class%% .featured-box-title",
        declaration: `padding: ${title_space[0]} ${title_space[1]} ${title_space[2]} ${title_space[3]};`,
      },
    ]);

    // Content
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

    // Content Space
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

    // Image
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

    // Button BG
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

    console.log(props);

    return additionalCss;
  }

  // get_space = () => {
  //   let title_space = this.props.nm_title_space

  //   if('' !== title_space){
  //     let space_val = title_space.split('|').filter(el => {
  //       return el !== ''
  //     })
  //     space_val.forEach(data => {
  //       this.setState((val) => {
  //         return {val : val.data}
  //       })
  //     });
  //     // var filtered = space_val.filter(function (el) {
  //     //   return el !== '';
  //     // });
  //     // return console.log(filtered)
  //   }
  // }

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
          className={utils.classnames(btn_class) + button_full_width} //featured-box-readmore display-inline-block
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

  render() {
    const title = this.props.nm_title;
    // const Content = this.props.content();
    const content = this.props.nm_content;
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
            <h3 className="featured-box-title">
              <span>{title}</span>
            </h3>
            <div className="featured-box-text">{content}</div>
            {this.render_button()}
          </div>
        </div>
      </>
    );
  }
}

export default NMDIVI_BLURB;
