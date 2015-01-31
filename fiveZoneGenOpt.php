				<div class="item">
					<h3 class="center">Azimuth</h3>
					<label style="float: left">
						Fixed
						<input name="azi_var_fix" value="fixed" onclick="hide('azivar')" type="radio">
					</label>
					<label>
						Variable
						<input name="azi_var_fix" value="variable" onclick="hide('azifix')" checked="checked" type="radio">
					</label><br>
					<div id="azivariable">
						<label>
							Initial Value
							<input name="azi_ini_value" value="90" min="0.0" max="360.0" step="any" type="number">					
						</label><br>
						<label>
							Minimum Value
							<input name="azi_min_value" value="0" min="0.0" max="360.0" step="any" type="number">
						</label><br>
						<label>
							Maximum Value
							<input name="azi_max_value" value="180" min="0.0" max="360.0" step="any" type="number">
						</label><br>
						<label>
							Step Value
							<input name="azi_step_value" value="90" type="number">
						</label><br>
					</div>
					<div id="azifixed" style="display: none;">
						<label>
							Value<input name="azi_value" value="90" min="0.0" max="360.0" step="any" type="number"><br>
						</label>
					</div>
				</div>
				
				<div class="item">
					<h3 class="center">WWR</h3>
					<label style="float: left">
						Fixed
						 <input name="wwr_var_fix" value="fixed" onclick="hide('wwrvar')" checked="checked" type="radio">
					</label>
					<label>
						Variable
						<input name="wwr_var_fix" value="variable" onclick="hide('wwrfix')" type="radio">
					</label><br>
					<div id="wwrfixed">
						<label>
							Value<input name="wwr_value" value="90" min="10.0" max="90.0" step="any" type="number"><br>
						</label><br>
					</div>
					<div id="wwrvariable" style="display:none;">
						<label>
							Initial Value
							<input name="wwr_ini_value" value="40" min="10.0" max="90.0" step="any" type="number">
						</label><br>
						<label>
							Minimum Value
							<input name="wwr_min_value" value="20" min="10.0" max="90.0" step="any" type="number">
						</label><br>
						<label>
							Maximum Value
							<input name="wwr_max_value" value="80" min="10.0" max="90.0" step="any" type="number">
						</label><br>
						<label>
							Step Value
							<input name="wwr_step_value" value="10" min="10.0" max="90.0" step="any" type="number">
						</label><br>
					</div>
				</div>
				
				<div class="item">
					<h3 class="center">Depth</h3>				
					<label style="float: left">
						Fixed
						<input name="depth_var_fix" value="fixed" onclick="hide('depthvar')" checked="checked" type="radio">
					</label>
					<label>
						Variable
						<input name="depth_var_fix" value="variable" onclick="hide('depthfix')" type="radio">
					</label><br>

					<div id="depthfixed">
						<label>
							Value
							<input name="depth_value" value="1" min="0.1" max="3.0" step="any" type="number"><br>
						</label><br>
					</div>

					<div id="depthvariable" style="display:none">
						<label>
							Initial Value
							<input name="depth_ini_value" value="0.5" min="0.1" max="3.0" step="any" type="number">
						</label><br>
						<label>
							Minimum Value
							<input name="depth_min_value" value="0.2" min="0.1" max="3.0" step="any" type="number">	
						</label><br>
						<label>
							Maximum Value
							<input name="depth_max_value" value="1" min="0.1" max="3.0" step="any" type="number">
						</label><br>
						<label>
							Step Value
							<input name="depth_step_value" value="0.1" min="0.1" max="3.0" step="any" type="number">	
						</label><br>
					</div>
				</div>

				<div class="item">
					<h3 class="center">Aspect Ratio</h3>

					<label style="float: left">
						Fixed
						<input name="lbybratio_var_fix" value="fixed" onclick="hide('lbybratiovar')" type="radio">
					</label>
					<label>
						Variable
						<input name="lbybratio_var_fix" value="variable" onclick="hide('lbybratiofix')" checked="checked" type="radio">
					</label><br>

					<div id="lbybratiofixed" style="display:none">
						<label>
							Value
							<input name="lbybratio_value" value="1" min="0.1" max="10.0" step="any" type="number"><br>
						</label><br>
					</div>

					<div id="lbybratiovariable">
						<label>
							Initial Value
							<input name="lbybratio_ini_value" value="1" step="any" type="number">
						</label><br>
						<label>
							Minimum Value
							<input name="lbybratio_min_value" value="1" step="any" type="number">
						</label><br>
						<label>
							Maximum Value
							<input name="lbybratio_max_value" value="2" step="any" type="number">
						</label><br>
						<label>
							Step Value
							<input name="lbybratio_step_value" value="0.5" step="any" type="number">
						</label><br>
					</div>
				</div>
				<div class="item" style="min-height:0px;width:93%;text-align:center">
					<input type="submit">
				</div>
