import React, {Component} from 'react'
import { Button, Form, Grid, Header, Image, Message, Segment } from 'semantic-ui-react'


class LoginForm extends Component {
	constructor(props) {
		super(props);
		this.state = {
			username: "",
			password: ""
		};

		this.handleChangeUsername = this.handleChangeUsername.bind(this);
		this.handleChangePassword = this.handleChangePassword.bind(this);
		this.handleSubmit = this.handleSubmit.bind(this);
	}

	tryLogin({username, password}){
		let formData = new FormData();
		formData.append('usn', username);
		formData.append('password', password);

		fetch(`//${window.location.hostname}/user/api/login.php`,
			{
				body: formData,
				method: "post"
			}).then(response => response.json())
			.then(jsondata => console.log(jsondata));
	}

	handleChangeUsername(e) {
		this.setState({ username: e.target.value });
	}

	handleChangePassword(e) {
		this.setState({ password: e.target.value });
	}

	handleSubmit(e){
		this.tryLogin(this.state)
	}

	render() {
		return (
			<div className='login-form'>
				<style>{`
      body > div,
      body > div > div,
      body > div > div > div.login-form {
        height: 100%;
      }
    `}
				</style>
				<Grid textAlign='center' style={{height: '100%'}} verticalAlign='middle'>
					<Grid.Column style={{maxWidth: 350}}>
						<Segment>
							<Image src={require("./img/IMG_20190509_114203.jpg")}/>
							<Form size='large' onSubmit={this.handleSubmit}>
								<Form.Input fluid icon='user' iconPosition='left' onKeyUp={this.handleChangeUsername} placeholder='Username'/>
								<Form.Input
									fluid
									icon='lock'
									iconPosition='left'
									placeholder='Password'
									type='password'
									onKeyUp={this.handleChangePassword}
								/>

								<Button color='blue' fluid size='small'>Login </Button>
							</Form>
						</Segment>
					</Grid.Column>
				</Grid>
			</div>
		);
	}
}

export default LoginForm
