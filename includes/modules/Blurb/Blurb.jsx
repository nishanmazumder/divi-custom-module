// External Dependencies
import React, { Component } from "react";

// Internal Dependencies
import "./style.css";

class NM_BLURB extends Component {
  static slug = "nm_divi_blurb";

  render() {
    const Title = this.props.nm_title;
    const Content = this.props.content();

    return (
      <>
        <div className="nm_text_bloc">
          <h1>{Title}</h1>
          <p>{Content}</p>
        </div>

        <div class="featured-box featured-box-default">
        <div class="featured-box-image">
          <div class="image-mask">
            <img src="#" alt="Tree Plantation System" />
          </div>
        </div>
        <div class="featured-box-content">
          <h3 class="featured-box-title">
            <span>Tree Plantation System </span>
          </h3>
          <div class="featured-box-text">
            Click edit button to change this text. Lorem ipsum dolor sit amet,
            consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper
            mattis, pulvinar dapibus leo.
          </div>
          <div class="featured-box-button">
            <a class="featured-box-readmore display-inline-block" href="#">
              Read More
            </a>
          </div>
        </div>
      </div>
      </>
    );
  }
}

export default NM_BLURB;
