--
-- Table structure for table `gpec_assessments`
--

CREATE TABLE `gpec_assessments` (
  `id` int(11) NOT NULL,
  `internal_taxon_id` int(11) NOT NULL,
  `habitat_narrative` longtext COLLATE utf8_spanish_ci NOT NULL,
  `range_narrative` text COLLATE utf8_spanish_ci NOT NULL,
  `population_narrative` text COLLATE utf8_spanish_ci NOT NULL,
  `threats_narrative` text COLLATE utf8_spanish_ci NOT NULL,
  `uses_narrative` text COLLATE utf8_spanish_ci NOT NULL,
  `conservation_actions_narrative` text COLLATE utf8_spanish_ci NOT NULL,
  `summary_credit_assessors_for_citation_only` text COLLATE utf8_spanish_ci NOT NULL,
  `summary_credit_assessors` text COLLATE utf8_spanish_ci NOT NULL,
  `summary_credit_contributors` text COLLATE utf8_spanish_ci NOT NULL,
  `summary_credit_reviewers` text COLLATE utf8_spanish_ci NOT NULL,
  `summary_credit_facilitators` text COLLATE utf8_spanish_ci NOT NULL,
  `summary_recommended_citation` text COLLATE utf8_spanish_ci NOT NULL,
  `redlist_assessment_acknowledgements` text COLLATE utf8_spanish_ci NOT NULL,
  `redlist_category` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `redlist_criteria` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `redlist_tag` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `redlist_assessment_scope` text COLLATE utf8_spanish_ci NOT NULL,
  `redlist_rationale` text COLLATE utf8_spanish_ci NOT NULL,
  `Assessment_HTML_code` text COLLATE utf8_spanish_ci NOT NULL,
  `Assessment_PDF_url` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `Species_recovery_plan_url` varchar(90) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Table structure for table `gpec_common_names`
--

CREATE TABLE `gpec_common_names` (
  `id` int(11) NOT NULL,
  `internal_taxon_id` int(11) NOT NULL,
  `common_name_language` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `common_name` varchar(90) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



--
-- Table structure for table `gpec_conservation_needed`
--

CREATE TABLE `gpec_conservation_needed` (
  `id` int(11) NOT NULL,
  `internal_taxon_id` int(11) NOT NULL,
  `conservationneeds_lookup` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Table structure for table `gpec_use`
--

CREATE TABLE `gpec_use` (
  `id` int(11) NOT NULL,
  `use_lookup` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `internal_taxon_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Table structure for table `gpec_distribution`
--

CREATE TABLE `gpec_distribution` (
  `id` int(11) NOT NULL,
  `internal_taxon_id` int(11) NOT NULL,
  `location_name` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `location_municipality` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `location_province` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `location_latitude` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `location_longitud` varchar(90) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Table structure for table `gpec_exsitucollections`
--

CREATE TABLE `gpec_exsitucollections` (
  `id` int(11) NOT NULL,
  `internal_taxon_id` int(11) NOT NULL,
  `exsitucollections_location` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `exsitucollections_size` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `exsitucollections_date` varchar(90) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



CREATE TABLE `gpec_habitats` (
  `id` int(11) NOT NULL,
  `internal_taxon_id` int(11) NOT NULL,
  `habitats_lookup` varchar(90) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Table structure for table `gpec_invasive_entry_route`
--

CREATE TABLE `gpec_invasive_entry_route` (
  `id` int(11) NOT NULL,
  `internal_taxon_id` int(11) NOT NULL,
  `invasive_entry_route` varchar(90) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gpec_invasive_impact`
--

CREATE TABLE `gpec_invasive_impact` (
  `id` int(11) NOT NULL,
  `internal_taxon_id` int(11) NOT NULL,
  `invasive_impact_lookup` varchar(90) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gpec_protected_areas`
--

CREATE TABLE `gpec_protected_areas` (
  `id` int(11) NOT NULL,
  `internal_taxon_id` int(11) NOT NULL,
  `ap_name` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `ap_type` varchar(90) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Table structure for table `gpec_references`
--

CREATE TABLE `gpec_references` (
  `id` int(11) NOT NULL,
  `internal_taxon_id` int(11) NOT NULL,
  `species_referencias_general` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Table structure for table `gpec_research_needed`
--

CREATE TABLE `gpec_research_needed` (
  `id` int(11) NOT NULL,
  `internal_taxon_id` int(11) NOT NULL,
  `researchneeds_lookup` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




CREATE TABLE `gpec_species` (
  `id` int(11) NOT NULL,
  `internal_taxon_id` int(11) NOT NULL,
  `species_division` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `species_classname` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `species_ordername` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `species_family` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `species_genus` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `species_name` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `species_authority` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `species_infra_rank_type` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `species_infra_rank_name` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `species_infra_rank_authority` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `species_htmlname` longtext COLLATE utf8_spanish_ci NOT NULL,
  `species_taxonomic_notes` text COLLATE utf8_spanish_ci NOT NULL,
  `species_herbarium_specimen` text COLLATE utf8_spanish_ci NOT NULL,
  `species_presence_reference` text COLLATE utf8_spanish_ci NOT NULL,
  `species_endemism_type` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `species_origen` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `species_origen_notes` text COLLATE utf8_spanish_ci NOT NULL,
  `species_presence` text COLLATE utf8_spanish_ci NOT NULL, 
  `species_plant_growth_form` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 12:34 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ferpa_gpec`
--

-- --------------------------------------------------------

--
-- Table structure for table `gpec_invasive`
--

CREATE TABLE `gpec_invasive` (
  `id` int(11) NOT NULL,
  `internal_taxon_id` int(11) NOT NULL,
  `species_is_invasive` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `species_is_naturalized` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `species_is_aweed` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `species_is_atransformer` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `species_is_itseffectunknown` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `species_naturalization_reference` varchar(90)  COLLATE utf8_spanish_ci NOT NULL,
  `species_invasive_species_datasheet_HtML_url` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `species_invasive_species_datasheet_PDF_url` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `species_invasive_narrative` varchar(90) COLLATE utf8_spanish_ci  NOT NULL,
  `species_invasive_rationale` varchar(90) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gpec_invasive`
--
ALTER TABLE `gpec_invasive`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gpec_invasive`
--
ALTER TABLE `gpec_invasive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--
-- Table structure for table `gpec_synonyms`
--

CREATE TABLE `gpec_synonyms` (
  `id` int(11) NOT NULL,
  `internal_taxon_id` int(11) NOT NULL,
  `synonyms_genus` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `synonyms_species_name` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `synonyms_species_authority` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `synonyms_infra_rank_type` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `synonyms_infra_rank_name` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `synonyms_infra_rank_authority` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `synonyms_infra_rank2_type` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `synonyms_infra_rank2_name` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `synonyms_infra_rank2_authority` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `synonyms_type` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `synonyms_is_basyonym` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `synonyms_htmlname` text COLLATE utf8_spanish_ci NOT NULL,
  `synonyms_taxonomic_notes` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Table structure for table `gpec_threats`
--

CREATE TABLE `gpec_threats` (
  `id` int(11) NOT NULL,
  `internal_taxon_id` int(11) NOT NULL,
  `threats_lookup` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `threats_timing` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `threats_scope` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `threats_severity` varchar(90) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gpec_assessments`
--
ALTER TABLE `gpec_assessments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gpec_common_names`
--
ALTER TABLE `gpec_common_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gpec_conservation_needed`
--
ALTER TABLE `gpec_conservation_needed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gpec_distribution`
--
ALTER TABLE `gpec_distribution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gpec_exsitucollections`
--
ALTER TABLE `gpec_exsitucollections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gpec_habitats`
--
ALTER TABLE `gpec_habitats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gpec_invasive_entry_route`
--
ALTER TABLE `gpec_invasive_entry_route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gpec_invasive_impact`
--
ALTER TABLE `gpec_invasive_impact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gpec_protected_areas`
--
ALTER TABLE `gpec_protected_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gpec_references`
--
ALTER TABLE `gpec_references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gpec_research_needed`
--
ALTER TABLE `gpec_research_needed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gpec_species`
--
ALTER TABLE `gpec_species`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gpec_synonyms`
--
ALTER TABLE `gpec_synonyms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gpec_threats`
--
ALTER TABLE `gpec_threats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gpec_use`
--
ALTER TABLE `gpec_use`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--


ALTER TABLE `gpec_references` ADD `reference_type` VARCHAR(90) NOT NULL AFTER `species_referencias_general`;

--
-- AUTO_INCREMENT for table `gpec_assessments`
--
ALTER TABLE `gpec_assessments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `gpec_common_names`
--
ALTER TABLE `gpec_common_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `gpec_conservation_needed`
--
ALTER TABLE `gpec_conservation_needed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `gpec_distribution`
--
ALTER TABLE `gpec_distribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1857;

--
-- AUTO_INCREMENT for table `gpec_exsitucollections`
--
ALTER TABLE `gpec_exsitucollections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gpec_habitats`
--
ALTER TABLE `gpec_habitats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=413;

--
-- AUTO_INCREMENT for table `gpec_invasive_entry_route`
--
ALTER TABLE `gpec_invasive_entry_route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gpec_invasive_impact`
--
ALTER TABLE `gpec_invasive_impact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gpec_protected_areas`
--
ALTER TABLE `gpec_protected_areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=630;

--
-- AUTO_INCREMENT for table `gpec_references`
--
ALTER TABLE `gpec_references`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=642;

--
-- AUTO_INCREMENT for table `gpec_research_needed`
--
ALTER TABLE `gpec_research_needed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `gpec_species`
--
ALTER TABLE `gpec_species`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `gpec_synonyms`
--
ALTER TABLE `gpec_synonyms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gpec_threats`
--
ALTER TABLE `gpec_threats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=480;

--
-- AUTO_INCREMENT for table `gpec_use`
--
ALTER TABLE `gpec_use`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `gpec_invasive_entry_route` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `gpec_references` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `gpec_research_needed` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT; 
