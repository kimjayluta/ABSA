import React from 'react'
import { Button, Form, Grid, Header, Image, Message, Segment } from 'semantic-ui-react'

const LoginForm = () => (
	<div className='login-form'>
		{/*
      Heads up! The styles below are necessary for the correct render of this example.
      You can do same with CSS, the main idea is that all the elements up to the `Grid`
      below must have a height of 100%.
    */}
		<style>{`
      body > div,
      body > div > div,
      body > div > div > div.login-form {
        height: 100%;
      }
    `}
		</style>
		<Grid textAlign='center' style={{ height: '100%' }} verticalAlign='middle'>
			<Grid.Column style={{ maxWidth: 350 }}>
				<Segment>
					<Image src={require("./img/IMG_20190509_114203.jpg")} />
					<Form size='large'>
						<Form.Input fluid icon='user' iconPosition='left' placeholder='Username' />
						<Form.Input
							fluid
							icon='lock'
							iconPosition='left'
							placeholder='Password'
							type='password'
						/>

						<Button color='blue' fluid size='small'>Login </Button>
					</Form>
				</Segment>
			</Grid.Column>
		</Grid>
	</div>
);

export default LoginForm
