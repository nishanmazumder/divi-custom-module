// External Dependencies
import React, { Component } from "react";

// Internal Dependencies
import "./style.css";

class NM_BLURB extends Component {
  static slug = "nm_divi_blurb";

  constructor(props){
    super(props)

    console.log(props)
  }

  render() {
    const Title = this.props.nm_title;
    // const Content = this.props.content();
    const Content = this.props.nm_content;
    const Image = this.props.nm_img;
    const Button_Txt = this.props.nm_btn;
    const Button_Url = this.props.nm_btn_url;




    return (
      <>
        <div className="featured-box featured-box-default">
          <div className="featured-box-image">
            <div className="image-mask">
              <img src={Image} alt="Tree Plantation System" />
            </div>
          </div>
          <div className="featured-box-content">
            <h3 className="featured-box-title">
              <span>{Title}</span>
            </h3>
            <div className="featured-box-text">
            {Content}
            </div>
            <div className="featured-box-button">
              <a className="featured-box-readmore display-inline-block" href={Button_Url}>
              {Button_Txt}
              </a>
            </div>
          </div>
        </div>
      </>
    );
  }
}

export default NM_BLURB;
