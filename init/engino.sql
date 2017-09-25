/*
 Navicat Premium Data Transfer

 Source Server         : codeanywhere-engino
 Source Server Type    : PostgreSQL
 Source Server Version : 90605
 Source Host           : 0.0.0.0
 Source Database       : engino
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 90605
 File Encoding         : utf-8

 Date: 09/25/2017 01:30:35 AM
*/

-- ----------------------------
--  Function structure for public.uuid_nil()
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_nil"();
CREATE FUNCTION "public"."uuid_nil"() RETURNS "uuid" 
	AS '$libdir/uuid-ossp','uuid_nil'
	LANGUAGE c
	COST 1
	STRICT
	SECURITY INVOKER
	IMMUTABLE;
ALTER FUNCTION "public"."uuid_nil"() OWNER TO "postgres";

-- ----------------------------
--  Function structure for public.uuid_ns_dns()
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_ns_dns"();
CREATE FUNCTION "public"."uuid_ns_dns"() RETURNS "uuid" 
	AS '$libdir/uuid-ossp','uuid_ns_dns'
	LANGUAGE c
	COST 1
	STRICT
	SECURITY INVOKER
	IMMUTABLE;
ALTER FUNCTION "public"."uuid_ns_dns"() OWNER TO "postgres";

-- ----------------------------
--  Function structure for public.uuid_ns_url()
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_ns_url"();
CREATE FUNCTION "public"."uuid_ns_url"() RETURNS "uuid" 
	AS '$libdir/uuid-ossp','uuid_ns_url'
	LANGUAGE c
	COST 1
	STRICT
	SECURITY INVOKER
	IMMUTABLE;
ALTER FUNCTION "public"."uuid_ns_url"() OWNER TO "postgres";

-- ----------------------------
--  Function structure for public.uuid_ns_oid()
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_ns_oid"();
CREATE FUNCTION "public"."uuid_ns_oid"() RETURNS "uuid" 
	AS '$libdir/uuid-ossp','uuid_ns_oid'
	LANGUAGE c
	COST 1
	STRICT
	SECURITY INVOKER
	IMMUTABLE;
ALTER FUNCTION "public"."uuid_ns_oid"() OWNER TO "postgres";

-- ----------------------------
--  Function structure for public.uuid_ns_x500()
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_ns_x500"();
CREATE FUNCTION "public"."uuid_ns_x500"() RETURNS "uuid" 
	AS '$libdir/uuid-ossp','uuid_ns_x500'
	LANGUAGE c
	COST 1
	STRICT
	SECURITY INVOKER
	IMMUTABLE;
ALTER FUNCTION "public"."uuid_ns_x500"() OWNER TO "postgres";

-- ----------------------------
--  Function structure for public.uuid_generate_v1()
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_generate_v1"();
CREATE FUNCTION "public"."uuid_generate_v1"() RETURNS "uuid" 
	AS '$libdir/uuid-ossp','uuid_generate_v1'
	LANGUAGE c
	COST 1
	STRICT
	SECURITY INVOKER
	VOLATILE;
ALTER FUNCTION "public"."uuid_generate_v1"() OWNER TO "postgres";

-- ----------------------------
--  Function structure for public.uuid_generate_v1mc()
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_generate_v1mc"();
CREATE FUNCTION "public"."uuid_generate_v1mc"() RETURNS "uuid" 
	AS '$libdir/uuid-ossp','uuid_generate_v1mc'
	LANGUAGE c
	COST 1
	STRICT
	SECURITY INVOKER
	VOLATILE;
ALTER FUNCTION "public"."uuid_generate_v1mc"() OWNER TO "postgres";

-- ----------------------------
--  Function structure for public.uuid_generate_v3(uuid, text)
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_generate_v3"(uuid, text);
CREATE FUNCTION "public"."uuid_generate_v3"(IN "namespace" uuid, IN "name" text) RETURNS "uuid" 
	AS '$libdir/uuid-ossp','uuid_generate_v3'
	LANGUAGE c
	COST 1
	STRICT
	SECURITY INVOKER
	IMMUTABLE;
ALTER FUNCTION "public"."uuid_generate_v3"(IN "namespace" uuid, IN "name" text) OWNER TO "postgres";

-- ----------------------------
--  Function structure for public.uuid_generate_v4()
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_generate_v4"();
CREATE FUNCTION "public"."uuid_generate_v4"() RETURNS "uuid" 
	AS '$libdir/uuid-ossp','uuid_generate_v4'
	LANGUAGE c
	COST 1
	STRICT
	SECURITY INVOKER
	VOLATILE;
ALTER FUNCTION "public"."uuid_generate_v4"() OWNER TO "postgres";

-- ----------------------------
--  Function structure for public.uuid_generate_v5(uuid, text)
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_generate_v5"(uuid, text);
CREATE FUNCTION "public"."uuid_generate_v5"(IN "namespace" uuid, IN "name" text) RETURNS "uuid" 
	AS '$libdir/uuid-ossp','uuid_generate_v5'
	LANGUAGE c
	COST 1
	STRICT
	SECURITY INVOKER
	IMMUTABLE;
ALTER FUNCTION "public"."uuid_generate_v5"(IN "namespace" uuid, IN "name" text) OWNER TO "postgres";

-- ----------------------------
--  Table structure for nodes
-- ----------------------------
DROP TABLE IF EXISTS "public"."nodes";
CREATE TABLE "public"."nodes" (
	"id" uuid NOT NULL DEFAULT uuid_generate_v4(),
	"parent_id" uuid,
	"data" jsonb,
	"created_at" timestamp(6) WITH TIME ZONE,
	"updated_at" timestamp(6) WITH TIME ZONE,
	"type_id" int4 NOT NULL
)
WITH (OIDS=FALSE);
ALTER TABLE "public"."nodes" OWNER TO "postgres";

-- ----------------------------
--  Table structure for types
-- ----------------------------
DROP TABLE IF EXISTS "public"."types";
CREATE TABLE "public"."types" (
	"id" int4 NOT NULL,
	"name" varchar(255) NOT NULL COLLATE "default",
	"allowed_in" int4[],
	"schema" jsonb,
	"view" varchar(255) COLLATE "default"
)
WITH (OIDS=FALSE);
ALTER TABLE "public"."types" OWNER TO "postgres";

-- ----------------------------
--  Primary key structure for table nodes
-- ----------------------------
ALTER TABLE "public"."nodes" ADD PRIMARY KEY ("id") NOT DEFERRABLE INITIALLY IMMEDIATE;

-- ----------------------------
--  Primary key structure for table types
-- ----------------------------
ALTER TABLE "public"."types" ADD PRIMARY KEY ("id") NOT DEFERRABLE INITIALLY IMMEDIATE;

