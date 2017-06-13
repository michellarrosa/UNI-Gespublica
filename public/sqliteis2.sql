
--
-- Indexes for dumped tables
--

--
-- Indexes for table `acl`
--


--
-- Indexes for table `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ID_2` (`id`),
  ADD UNIQUE KEY `ModName_UNIQUE` (`nome`),
  ADD UNIQUE KEY `ModType_UNIQUE` (`Tipo`),
  ADD KEY `ID` (`id`),
  ADD KEY `ACL_idACL` (`ACL`),
  ADD KEY `id_3` (`id`);

--
-- Indexes for table `contadeusuario`
--
ALTER TABLE `contadeusuario`
  ADD PRIMARY KEY (`id`,`perfildeusuarios_CPF`,`ACL`),
  ADD UNIQUE KEY `session` (`session`),
  ADD KEY `fk_ContaDeUsuario_PerfilDeUsuarios1_idx` (`perfildeusuarios_CPF`),
  ADD KEY `fk_ContaDeUsuario_ACL1_idx` (`ACL`);


--
-- Indexes for table `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_acl_id` (`ACL`),
  ADD KEY `fk_screen_id` (`screen`);

--
-- Indexes for table `perfildeusuarios`
--
ALTER TABLE `perfildeusuarios`
  ADD PRIMARY KEY (`CPF`);

--
-- Indexes for table `screens`
--
ALTER TABLE `screens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_screen` (`ACL`),
  ADD KEY `componentes_id` (`componentes_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `componentes`
--
ALTER TABLE `componentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contadeusuario`
--
ALTER TABLE `contadeusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `screens`
--
ALTER TABLE `screens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `componentes`
--
ALTER TABLE `componentes`
  ADD CONSTRAINT `fk_Componentes_ACL1` FOREIGN KEY (`ACL`) REFERENCES `acl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `contadeusuario`
--
ALTER TABLE `contadeusuario`
  ADD CONSTRAINT `fk_ContaDeUsuario_ACL1` FOREIGN KEY (`ACL`) REFERENCES `acl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ContaDeUsuario_PerfilDeUsuarios1` FOREIGN KEY (`perfildeusuarios_CPF`) REFERENCES `perfildeusuarios` (`CPF`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `screens`
--
ALTER TABLE `screens`
  ADD CONSTRAINT `fk_screen` FOREIGN KEY (`ACL`) REFERENCES `acl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `screens_ibfk_1` FOREIGN KEY (`componentes_id`) REFERENCES `componentes` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
