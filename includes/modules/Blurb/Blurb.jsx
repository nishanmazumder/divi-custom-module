// External Dependencies
import React, { Component } from "react";

// Internal Dependencies
import "./style.css";

class NMDIVI_BLURB extends Component {
  static slug = "nmdivi_blurb";

  static css(props) {
    let additionalCss = [];

    // Title
    additionalCss.push([
      {
        selector: "%%order_class%% .featured-box-title",
        declaration: `background-color: ${props.nm_title_bg};`,
      },
    ]);

    // if(props.title_bg_hover){
    //   additionalCss.push([
    //     {
    //       selector: "%%order_class%% .featured-box-title",
    //       declaration: `background-color: ${props.title_bg_hover};`,
    //     },
    //   ]);
    // }

    // Content
    additionalCss.push([
      {
        selector: "%%order_class%% .featured-box-content",
        declaration: `background-color: ${props.nm_content_bg} !important;`,
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

    // Button
    // additionalCss.push([
    //   {
    //     selector: "%%order_class%% .featured-box-button a",
    //     declaration: `background-color: ${props.nm_btn_bg};`,
    //   },
    // ]);

    console.log(props);

    return additionalCss;
  }

  render_button() {
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

    if (!btn_text || !btn_url) return "";

    return (
      <div className="featured-box-button">
        <a
          className={utils.classnames(btn_class)} //featured-box-readmore display-inline-block
          href={btn_url}
          target={btn_target}
          rel={utils.linkRel(this.props.button_rel)}
          data-icon={btn_icon}
        >
          {btn_text}
        </a>
      </div>
    );
  }

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
