import React, { Component } from 'react'
import ProgressBar from 'react-bootstrap/ProgressBar'

import { FontAwesomeIcon } from "@fortawesome/react-fontawesome"


export class Avencement_group extends Component {
    constructor(props)
    {
        super(props)
    }

render() {
    if (this.props.data < 70) {
      let group_progress =  <ProgressBar variant="warning" now={this.props.data} label={`${this.props.data}%`}/>
      return (
        <div class="border-bottom shadow-lg p-3 mb-5 bg-body rounded">
          <h4> 
            <i class="fa-solid fa-user-group"></i> Etat d'avancement du Group :
          </h4>
            <div>
              {group_progress}
            </div>
        </div>
)
    } else {
      let group_progress =  <ProgressBar variant="success" now={this.props.data} label={`${this.props.data}%`}/>
      return (
        <div class="border-bottom shadow-lg p-3 mb-5 bg-body rounded">
          <FontAwesomeIcon icon="fa-solid fa-user-group" /><h4>Etat d'avancement du Group :</h4>
           <div>
                 {group_progress}
           </div>
        </div>
      )
    }
  }
}

export default Avencement_group