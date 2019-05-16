import React, {Component} from 'react';
import { Menu } from 'semantic-ui-react'

class NavBar extends Component {

	handleItemClick(){
		localStorage.removeItem("account");
		localStorage.removeItem("type");
		localStorage.removeItem("tour_id");

		window.location.reload(true);
	}

	render() {
		return (
			<div style={{"marginBottom": "20px"}}>
				<Menu pointing secondary>
					<div className="ui container">
						<Menu.Item name={this.props.name} active={true}/>
						<Menu.Menu position='right'>
							<Menu.Item
								name='logout'
								active={false}
								onClick={this.handleItemClick}
							/>
						</Menu.Menu>
					</div>
				</Menu>
			</div>

		);
	}
}

export default NavBar;