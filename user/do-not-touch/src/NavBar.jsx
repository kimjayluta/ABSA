import React, {Component} from 'react';
import {Table, Menu, Segment, Button} from 'semantic-ui-react'

class NavBar extends Component {
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